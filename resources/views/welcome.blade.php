@extends('layout')

@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light text-center">Добре дошли!</h1>
                    <p class="lead text-muted mx-auto text-center pt-3">Можете да стартирате "Нова Игра" или да видите
                        "Класацията".</p>

                    <div class="container pt-5">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center text-center">Нова Игра</h5>
                                            <p class="card-text text-center">След като натиснете бутона ще започнете нова игра на "Бикове и Крави".</p>
                                            <a href="/start">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon"
                                                    viewBox="0 0 512 512">
                                                    <title>Нова Игра</title>
                                                    <path
                                                        d="M448 256c0-106-86-192-192-192S64 150 64 256s86 192 192 192 192-86 192-192z"
                                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                        stroke-width="32" />
                                                    <path
                                                        d="M216.32 334.44l114.45-69.14a10.89 10.89 0 000-18.6l-114.45-69.14a10.78 10.78 0 00-16.32 9.31v138.26a10.78 10.78 0 0016.32 9.31z" />
                                                </svg>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-center">Класация</h5>
                                            <p class="card-text text-center">След като натиснете бутона ще видите класацията на играта "Бикове и Крави"</p>
                                            <a href="/ranking">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon"
                                                    viewBox="0 0 512 512">
                                                    <title>Виж Класация</title>
                                                    <circle cx="256" cy="160" r="128" fill="none"
                                                        stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <path
                                                        d="M143.65 227.82L48 400l86.86-.42a16 16 0 0113.82 7.8L192 480l88.33-194.32"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <path
                                                        d="M366.54 224L464 400l-86.86-.42a16 16 0 00-13.82 7.8L320 480l-64-140.8"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                    <circle cx="256" cy="160" r="64" fill="none"
                                                        stroke="black" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32" />
                                                </svg>
                                            </a>
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