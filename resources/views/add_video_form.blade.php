@extends("layouts.template")

@section("main_content")

	<div class="container">

		<h2>Add a new video</h2>

		<div class="row" id="rawUrlBox">
			<div class="input-field col s12 m10 l11">
					<input id="rawUrl" type="text">
					<label for="rawUrl">Paste in your YouTube or Vimeo link</label>
			</div>
			<div class="col s12 m1">
				<button class="btn-large waves-effect waves-light amber darken-1" id="parseUrlBtn">
					<i class="material-icons">search</i>      			
				</button>
			</div>
		</div>

		<div class="row scale-transition scale-out" id="resultBox">

			<div class="row section" id="resultMessage">

				<div class="preloader-wrapper active">
    				<div class="spinner-layer spinner-red-only">
      					<div class="circle-clipper left">
        					<div class="circle"></div>
      					</div>
      					<div class="gap-patch">
        					<div class="circle"></div>
      					</div>
      					<div class="circle-clipper right">
        					<div class="circle"></div>
      					</div>
    				</div>
  				</div>
  					 
			</div>

			<form method="POST" id="addVideoForm" class="scale-transition scale-out">

				<div class="row">
							<div class="input-field col s12">
									<input id="title" name="title" type="text" class="validate" required>
									<label for="title">Video Title</label>
							</div>
						</div>

						<div class="row">
							<div class="input-field col s12">
									<textarea id="description" name="description" class="materialize-textarea" required></textarea>
									<label for="description">Description</label>
							</div>
						</div>

						<input type="hidden" id="platform" name="platform"></input>
						<input type="hidden" id="url" name="url"></input>
						<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

						<button class="btn waves-effect waves-light amber darken-1" type="submit" name="submit">
							Submit
						<i class="material-icons right">send</i>
					</button>
				
			</form>

		</div> {{-- /resultBox --}}

	</div> {{-- /container --}}

@endsection