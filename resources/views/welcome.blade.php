@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container pd-x-0">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 mg-b-20 mg-lg-b-0 mg-t-20 mg-lg-t-0">
                    <h4 class="tx-bold">{{__('About Us')}}</h4>
                    @isset($aboutUsInfo)
                        <p class="tx-13 mg-t-25">{!! $aboutUsInfo->description !!}</p>
                    @else
                        <p class="tx-13 mg-t-25">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                            only five centuries, but also the leap into electronic typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                            Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                            including versions of Lorem Ipsum.<br>Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book. It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                            sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like
                            Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    @endisset
                </div>
                <div class="col-lg-6">
                    <div class="row d-flex justify-content-between">
                        <div class="col-6 mg-b-10">
                            <img src="{{ asset('storage/img/books.jpg') }}" class="wd-100p"/>
                        </div>
                        <div class="col-6 mg-b-10">
                            <img src="{{ asset('storage/img/books2.jpg') }}" class="wd-100p"/>
                        </div>
                        <div class="col-6 mg-b-10">
                            <img src="{{ asset('storage/img/books3.jpg') }}" class="wd-100p"/>
                        </div>
                        <div class="col-6 mg-b-10">
                            <img src="{{ asset('storage/img/books4.jpg') }}" class="wd-100p"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content bg-gray-100">
        <div class="container pd-x-0">
            <h4 class="tx-bold">{{ __('Book of the week') }}</h4>
            <div class="row mg-t-30 d-flex justify-content-center align-items-center">
                <div class="col-md-4">
                    <img src="{{asset('storage/img/bookoftheweek.jpg') }}" class="wd-100p"/>
                </div>
                <div class="col-md-8 mg-t-20 mg-md-t-0">
                    <h4>Being and nothingness</h4>
                    <p class="tx-13 mg-t-25">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                        only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                        Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker
                        including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content mg-b-50">
        <div class="container pd-x-0">
            <h4 class="tx-bold">{{__('Our partners')}}</h4>
            <div class="row row-xs mg-t-40 d-flex justify-content-between">
            <div class="col-4 col-lg-2 mg-b-15 mg-lg-b-0"><img src="{{ asset('storage/img/partner1.png') }}"
                class="wd-100p"/></div>
            <div class="col-4 col-lg-2 mg-b-15 mg-lg-b-0"><img src="{{ asset('storage/img/partner2.png') }}"
                class="wd-100p"/></div>
            <div class="col-4 col-lg-2 mg-b-15 mg-lg-b-0"><img src="{{ asset('storage/img/partner3.png') }}"
                class="wd-100p"/></div>
            <div class="col-4 col-lg-2 mg-b-15 mg-lg-b-0"><img src="{{ asset('storage/img/partner4.png') }}"
                class="wd-100p"/></div>
            </div>
        </div>
    </div>
@endsection
