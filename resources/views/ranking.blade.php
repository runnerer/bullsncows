@extends('layout')

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="container pt-1">
                    <h1 class="fw-light text-center">Класация</h1>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/start" class="btn btn-dark" tabindex="-1" role="button" aria-disabled="true">Нова Игра</a>
                    </div>
                </div>
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <p class="card-text text-center">Вижте най-добрите 10 играча.</p>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Играч №</th>
                                                <th scope="col">Име</th>
                                                <th scope="col">Ходове до победа</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyResults">
                                            @for ($i = 0; $i < count($results); $i++)
                                                <tr>
                                                    <th scope="row">{{$i+1}}</th>
                                                    <td>{{$results[$i]->username}}</td>
                                                    <td>{{$results[$i]->guesses}}</td>
                                                </tr>
                                            @endfor
                                        </tbody>
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