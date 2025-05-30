@extends('website.layout.app')

@section('content')
<!-- Banner -->
<div class="inner-banner">
    <div class="inner-banner-overlay"></div>
    <div class="inner-banner-cntnt" data-aos="fade-up">
        <div class="custom-container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('jobs.index') }}">Jobs</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $job->title }}</li>
                </ol>
            </nav>
            <h1>{{ $job->title }}</h1>
            <p>{{ $job->company_name }}</p>
        </div>
    </div>
</div>

<!-- Job Detail -->
<div class="main-body py-5">
    <section class="custom-container">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">

                <!-- Meta info -->
                <div class="job-meta d-flex flex-wrap gap-3 mb-4 text-muted">
                    <div><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($job->date)->format('F d, Y') }}</div>
                    <div><i class="fas fa-map-marker-alt"></i> {{ $job->locationModel->title ?? 'N/A' }}</div>
                    <div><i class="fas fa-briefcase"></i> {{ ucwords(str_replace('_', ' ', strtolower($job->job_type))) }}</div>
                    <div><i class="fas fa-dollar-sign"></i> {{ $job->salary_rang ?? 'Negotiable' }}</div>
                </div>

                <!-- Job Description -->
                <h2 class="mb-3">Job Description</h2>
                <div class="job-description mb-5">
                    {!! $job->description !!}
                </div>

                <!-- Apply Now Form -->
                <div class="apply-now-form bg-light p-4 rounded shadow-sm">
                    <h3 class="mb-4">Apply Now</h3>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required placeholder="Your Name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="your@email.com">
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label">Upload Resume (PDF/DOC)</label>
                            <input type="file" id="resume" name="resume" class="form-control" accept=".pdf,.doc,.docx">
                        </div>
                        <div class="mb-3">
                            <label for="cover_letter" class="form-label">Cover Letter</label>
                            <textarea id="cover_letter" name="cover_letter" rows="4" class="form-control" placeholder="Write something..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    AOS.init({ duration: 2000, once: true });
</script>
@endpush
