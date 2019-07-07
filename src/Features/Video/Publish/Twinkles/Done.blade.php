@extends('library::Elements.Layouts.Cards.Standard')
@inject('inspiring', 'Illuminate\Foundation\Inspiring')

@section('card.title', 'Publish done')

@section('card.body', 'Your video was successfuly published and it is now activated in the website. All notifications were also sent.')

@section('card.footer', $inspiring::quote())