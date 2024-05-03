<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Auth;
use Carbon\Carbon;
Use DateTime;

class GoalController extends Controller
{
    public function showGoalData(){
        $goals = Goal::where('user_id', auth()->id())->get();
    
        if ($goals->isEmpty()) {
            return view('user_goalsetting', ['noDataMessage' => 'No goals set yet. Start setting your goals today😎!']);
        }else{

            return view('user_goalsetting', ['goals' => $goals,]);
        }
    
    }
    
    public function storeGoal(Request $request){
        $validatedData = $request->validate([
            'category' => 'required|string',
            'title' => 'required|string',
            'goal_amount'=> 'required|numeric',
            'current_amount'=> 'nullable|numeric',
            'description' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $validatedData['user_id'] = Auth::id();

        Goal::create($validatedData);

        return redirect('/user_goalsetting')->with('success', [
            'message' => 'Goal Set Successfully!',
            'duration' => 2000,
        ]);
        
    }

    public function addcurrentamount(Request $request, $id){
        $goal = Goal::find($id);
        $addedAmount = $request->input('addedAmount');
        $goal->current_amount += $addedAmount;
        $goal->save();
    
        
        return redirect('/user_goalsetting')->with([
            'success' => [
                'amount_message' => 'Successfully added amount to the goal',
                'duration' => 2000,
                'goal_id' => $id,
            ],
        ]);

    }

    public function calculateProjectedDates($goals){
        foreach ($goals as $goal) {
            // Calculate the projected completion date
            if ($goal->current_amount < $goal->goal_amount) {
                $updatedAt = new DateTime($goal->updated_at);
                $startDate = new DateTime($goal->start_date);
                $daysBetweenAdds = $updatedAt->diff($startDate)->days;
                $remainingAmount = $goal->goal_amount - $goal->current_amount;
    
                // Check if last_added_amount is not zero
                if ($goal->last_added_amount != 0) {
                    $daysToComplete = $remainingAmount / $goal->last_added_amount * $daysBetweenAdds;
                    $projectedCompleteDate = $updatedAt->modify('+' . $daysToComplete . ' days');
                    $goal->projected_attainment_date = $projectedCompleteDate->format('Y-m-d');
                } else {
                    // Handle the case when last_added_amount is zero
                    $goal->projected_attainment_date = null;
                }
            }
        }
    }
    

public function classifyGoals()
    {
        $goals = Goal::all();

        foreach ($goals as $goal) {
            $createdAt = Carbon::parse($goal->created_at);
            $currentDate = Carbon::now();
            $durationInDays = $createdAt->diffInDays($currentDate);

            // Define time intervals for each period
            $shortTermThreshold = 30; // For example, less than 30 days
            $mediumTermThreshold = 180; // For example, between 30 and 180 days
            // Long-term for anything greater than 180 days

            // Classify the goal based on the duration
            if ($durationInDays <= $shortTermThreshold) {
                $goal->period = 'Short-term';
            } elseif ($durationInDays <= $mediumTermThreshold) {
                $goal->period = 'Medium-term';
            } else {
                $goal->period = 'Long-term';
            }

            // Save the classification
            $goal->save();
        }

    }

}
