@extends('layout')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="container pt-1">
                    <h1 class="fw-light text-center">Нова Игра</h1>
                    <p class="lead text-muted mx-auto text-center pt-3">Можете да рестартирате играта или да видите
                        "Класацията".</p>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Име на играча:</span>
                        <input id="username" type="text" class="form-control" aria-label="Въведи своето име" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/start" class="btn btn-dark" tabindex="-1" role="button" aria-disabled="true">Рестартирай</a>
                        <a href="/ranking" class="btn btn-outline-dark" tabindex="-1" role="button" aria-disabled="true">Класация</a>
                    </div>
                </div>
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text text-center">Въведете число.</p>
                                    <div class="input-group mb-3">
                                        <input id="userGuess" type="text" class="form-control" placeholder="1234">
                                        <button class="btn btn-dark" type="button" id="button-addon2" onclick="play()">Играй</button>
                                    </div>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                            <th scope="col">Ход №</th>
                                            <th scope="col">Въведено число</th>
                                            <th scope="col">Бикове и Крави</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyResults"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    const generatedDigitArray = ('' + {{implode('', $numbers)}}).split('');
    let userGuesses = 0;

    function play() {
        const username = document.getElementById('username');
        const userGuess = document.getElementById('userGuess');

        if (!validateUserInput(username, userGuess)) {
            return;
        }

        const userDigitArray = ('' + userGuess.value).split('');
        let bulls = 0;
        let cows = 0;

        for (let i = 0; i < userDigitArray.length; i++) {
            if (userDigitArray[i] === generatedDigitArray[i]) {
                bulls++;
            }

            for (let j = 0; j < generatedDigitArray.length; j++) {
                if (userDigitArray[i] === generatedDigitArray[j]) {
                    cows++;
                }
            }
        }

        userGuesses += 1;

        addNewTableRow(bulls, cows, userGuess.value);

        userGuess.value = '';

        if (bulls === 4) {
            saveGameResults(username.value, userGuesses);

            alert('Честито, отгатнахте числото! Може да видите Класацията!');
        }
    }

    function validateUserInput(username, userGuess) {
        if (!username.value) {
            alert('Нужно е да въведете своето име, за да продължите!');

            return false;
        }

        if (!userGuess.value) {
            alert('Нужно е да въведете число, за да продължите!');

            return false;
        }

        if (isNaN(userGuess.value)) {
            alert('Нужно е да въведете число, за да продължите!');
            
            return false;
        }

        const userDigitArray = ('' + userGuess.value).split('');

        if (userDigitArray.length !== 4) {
            alert('Нужно е да въведете число, което да съдържа 4 цифри!');

            return false;
        }

        const userUniqueDigitArray = [...new Set(userDigitArray)];        

        if (userUniqueDigitArray.length < 4) {
            alert('Нужно е да въведете число, на което всяка цифра да е уникална!');

            return false;
        }

        return true;
    }

    function addNewTableRow(bulls, cows, userGuess) {
        const username = document.getElementById('tbodyResults');
        const row = `
            <tr>
                <th scope="row">${userGuesses}</th>
                <td>${userGuess}</td>
                <td>🐂: ${bulls} & 🐄: ${cows}</td>
            </tr>`;

        username.insertAdjacentHTML('beforeend', row)
    }

    function saveGameResults(username, userGuesses) {
        const xhr = new XMLHttpRequest();

        xhr.open("POST", "/save", true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        xhr.send(JSON.stringify({
            username: username,
            userGuesses: userGuesses
        }));
    }
</script>
@endsection