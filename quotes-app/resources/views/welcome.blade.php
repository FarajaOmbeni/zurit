<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>Shuffle cards</h1>
        <button type="submit" id="shuffle-cards" onclick="getshufflecards()">Shuffle</button>
    </div>

    <div>
        <h1>Draw a card</h1>
        <button type="submit" id="draw-card" onclick="drawcard()">Draw</button>
    </div>

    <img src="" id="cardImage" alt="cardImage">

    <div>
        <h1>Shuffle Cards</h1>
        <button type="submit" onclick="shufflecards()">Shuffle Cards</button>
    </div>

    <script>
        function getshufflecards(jokers_enabled=true) {
            fetch('https://deckofcardsapi.com/api/deck/new/?cards=AS,2S,KS,X1,X2', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        function drawcard() {
            const image = '';
            fetch('https://www.deckofcardsapi.com/api/deck/thsjf86cc6w3/draw/?count=1', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    let image = data.cards[0].image;
                    document.getElementById('cardImage').src = image;
                    console.log(data);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        function shufflecards() {
            fetch('https://www.deckofcardsapi.com/api/deck/thsjf86cc6w3/shuffle/', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
        }
    </script>
</body>

</html>
