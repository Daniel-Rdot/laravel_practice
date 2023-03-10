{{--for the component to know the listing, we need to hand it over --}}
{{--the blade directive is @props--}}
<?php use App\Models\Company?>

@props(['listing'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{Company::find($listing->company_id)->logo ? asset('storage/' . Company::find($listing->company_id)->logo) : asset('/images/no-image.png')}}"
            alt=""/>
        <div>
            <h3 class="text-2xl">
                {{-- dynamischer titel--}}
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">
                <a href="/companies/{{$listing->company_id}}">
                    {{Company::find($listing->company_id)->name}}</a>
            </div>
            <x-listing-tags :tagsCsv="$listing->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>
