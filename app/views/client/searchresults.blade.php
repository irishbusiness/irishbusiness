@extends('client.layouts.default')

@section('actual-body-content')
	<div class="content-wrapper">
				<div class="zone-content equalize zone clearfix">

					<div class="content-container container-16">

						<div class="companies-listings block">
							<div class="block-title">
								<h1>Search Results</h1>
							</div>
							<!-- <div class="pagination">
								<div class="pagination-buttons">
									<a href="#" class="current-page">1</a>
									<a href="#">2</a>
									<a href="#">3</a>
								</div>
							</div> -->
<?php							
							Event::listen('illuminate.query', function($query, $params, $time, $conn) 
							{ 
								var_dump($query);
							    /*dd(array($query, $params, $time, $conn));*/
							});
?>
							
							@foreach($branches as $branch)

								<pre>{{var_dump($branch->id)}}</pre>
							@endforeach


							{{ $branches->appends(array('category' => $category,'location' =>$location))->links() }}
						</div>

					</div><!-- end of .content-container -->

				</div><!-- end of .zone-content -->
				
			</div><!-- end of .content-wrapper -->
@stop