<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight</title>
    <style>
    body {
        font-family: sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        color: #333;
    }

    .container {
        max-width: 960px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .cards {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .cardss img {
        width: 60px;
        height: 60px;
        margin-right: 20px;
    }

    .cards .content {
        flex: 1;
    }

    .cards .content h2 {
        margin-bottom: 10px;
    }

    .cards .content p {
        margin-bottom: 5px;
    }

    .cards .content span {
        font-weight: bold;
    }

    .cards .price {
        font-size: 1.2em;
        font-weight: bold;
    }

    .btns-container {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .btns {
        background-color: #dc3545;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btns:hover {
        background-color: #c82333;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Weight</h1>
        <div class="cards">
            <img src="../assets/images/new folder/envelop.jpg" class="envelop" alt="Envelope">
            <div class="content">
                <h2>Envelope</h2>
                <p>50 to 500 gr</p>
                <p>38 x 26.5 x 3.2 cm</p>
                <span class="price">€ 3.15</span>
            </div>
        </div>
        <div class="cards">
            <img src="https://cdn.pixabay.com/photo/2016/03/31/20/59/package-1296169_960_720.png" alt="Mailbox Parcel">
            <div class="content">
                <h2>Mailbox parcel</h2>
                <p>Maximum 2 kg</p>
                <p>35 x 25 x 3 cm</p>
                <span class="price">€ 5.95</span>
            </div>
        </div>
        <div class="cards">
            <img src="https://cdn.pixabay.com/photo/2016/03/31/20/59/package-1296169_960_720.png" alt="Small parcel">
            <div class="content">
                <h2>Small parcel</h2>
                <p>Maximum 5 kg</p>
                <p>45 x 35 x 5 cm</p>
                <span class="price">€ 9.95</span>
            </div>
        </div>
        <div class="cards">
            <img src="https://cdn.pixabay.com/photo/2016/03/31/20/59/package-1296169_960_720.png" alt="Medium parcel">
            <div class="content">
                <h2>Medium parcel</h2>
                <p>Maximum 10 kg</p>
                <p>60 x 40 x 10 cm</p>
                <span class="price">€ 14.95</span>
            </div>
        </div>
        <div class="cards">
            <img src="https://cdn.pixabay.com/photo/2016/03/31/20/59/package-1296169_960_720.png" alt="Large parcel">
            <div class="content">
                <h2>Large parcel</h2>
                <p>Maximum 20 kg</p>
                <p>80 x 60 x 15 cm</p>
                <span class="price">€ 24.95</span>
            </div>
        </div>
        <div class="btns-container">
            <button class="btns">Calculate</button>
        </div>
    </div>
</body>

</html>