<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Social</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="group" value="general">
                        <div class="form-group">
                            <label>Site Name</label>
                            {{ Form::text('site_name', config('settings.site_name.value'), ['class' => 'form-control form-control-sm' . ($errors->has('site_name') ? 'border-danger' : '')]) }}
                            @error('site_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Description</label>
                            {{ Form::text('site_title', config('settings.site_title.value'), ['class' => 'form-control form-control-sm' . ($errors->has('site_title') ? 'border-danger' : '')]) }}
                            @error('site_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fav Icon</label>
                            {{ Form::text('site_logo', config('settings.site_logo.value'), ['class' => 'form-control form-control-sm' . ($errors->has('site_logo') ? 'border-danger' : '')]) }}
                            @error('site_logo')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fav Icon</label>
                            {{ Form::text('fav_icon', config('settings.fav_icon.value'), ['class' => 'form-control form-control-sm' . ($errors->has('fav_icon') ? 'border-danger' : '')]) }}
                            @error('fav_icon')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <div class="col-md-6">
                        <input type="hidden" name="group" value="social">
                        <div class="form-group">
                            <label>Facebook</label>
                            {{ Form::text('facebook', config('settings.facebook.value'), ['class' => 'form-control form-control-sm' . ($errors->has('facebook') ? 'border-danger' : '')]) }}
                            @error('facebook')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Instagram</label>
                            {{ Form::text('instagram', config('settings.instagram.value'), ['class' => 'form-control form-control-sm' . ($errors->has('instagram') ? 'border-danger' : '')]) }}
                            @error('instagram')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Twitter</label>
                            {{ Form::text('twitter', config('settings.twitter.value'), ['class' => 'form-control form-control-sm' . ($errors->has('twitter') ? 'border-danger' : '')]) }}
                            @error('twitter')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Github</label>
                            {{ Form::text('github', config('settings.github.value'), ['class' => 'form-control form-control-sm' . ($errors->has('github') ? 'border-danger' : '')]) }}
                            @error('github')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>LinkedIn</label>
                            {{ Form::text('linkedin', config('settings.linkedin.value'), ['class' => 'form-control form-control-sm' . ($errors->has('linkedin') ? 'border-danger' : '')]) }}
                            @error('linkedin')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script>

     $(document).ready(function(){
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })

        $('form').on('submit', function(e){
            e.preventDefault();
            let activeTab = $('.nav-tabs .nav-link.active');
            let activeStep = activeTab.attr('aria-controls');
            let form = $(this);

            // Disable form fields in other steps before form submission
            form.find('.tab-pane').not(`#${activeStep}`).find('input').prop('disabled', true);

            // Submit the form
            form.off('submit').submit();

            // Re-enable disabled fields after submission
            form.find('.tab-pane').not(`#${activeStep}`).find('input').prop('disabled', false);
        });
    });
</script>

@endpush

