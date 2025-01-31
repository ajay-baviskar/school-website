@extends('layouts.theme')

@section('content')
<div class="container my-5">
    <!-- Notice Board Section -->
    <div class="text-center mb-4">
        <h1 class="display-4">Notice Board</h1>
        <p class="text-muted">Stay updated with the latest notices and announcements.</p>
    </div>

    <div class="row">
        @if(isset($notices) && count($notices) > 0)
            @foreach($notices as $notice)
            <div class="col-lg-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $notice->name }}</h5>
                        <p class="card-text">{{ $notice->desc }}</p>
                        @if($notice->url_name)
                        <a href="{{ $notice->url_name }}" target="_blank" class="btn btn-primary">Read More</a>
                        @endif
                        <p class="text-muted small mb-0">Date: {{ \Carbon\Carbon::parse($notice->date)->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="col-12 text-center">
            <p class="text-muted">No notices available at the moment.</p>
        </div>
        @endif
    </div>

    @if(isset($notices))
    <div class="d-flex justify-content-center mt-4">
        {{ $notices->links() }}
    </div>
    @endif

    <!-- Holiday Schedule Section -->
    <div class="my-5">
        <h2 class="text-center">Holiday Schedule</h2>

        <div class="row">
            @if(isset($holidays) && count($holidays) > 0)
                @foreach($holidays as $holiday)
                <div class="col-lg-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $holiday->title }}</h5>
                            <p class="card-text">{{ $holiday->description }}</p>
                            <p class="text-muted mb-0">
                                Date: {{ \Carbon\Carbon::parse($holiday->holiday_date)->format('d M Y') }}
                            </p>
                            <p class="text-muted small">
                                Type:
                                @if($holiday->type === 'regular')
                                    Regular Holiday
                                @elseif($holiday->type === 'non_instruction')
                                    Non-Instruction Day
                                @else
                                    Holiday Falling on Sunday
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-12 text-center">
                <p class="text-muted">No holidays available at the moment.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
