						<div id="company-tabs-blog" class="company-tabs-content">
							<div class="blog block">
								<div class="block-title">
									<h1>Blog</h1>
								</div>
								@if(count($blogs)>0)
									@foreach($blogs as $blog)
										<div class="blog-post-preview">
											<div class="blog-post-preview-left">
												<div class="blog-post-date">
													<div class="day">{{ date("d",strtotime($blog->created_at)) }}</div>
													<div class="month">{{ date("F",strtotime($blog->created_at)) }}</div>
													<div class="year">{{ date("Y",strtotime($blog->created_at)) }}</div>
												</div>
											</div>
											<div class="blog-post-preview-right">
												<div class="blog-post-image">
													<img src="{{ URL::asset($blog->blogheaderimage) }}" alt="" />
												</div>
												<div class="blog-post-description clearfix">
													<div class="blog-post-title-comments">
														<a href="blog/{{ $blog->id }}" class="blog-post-title">{{ $blog->title }}</a>
													</div>
													<div class="blog-post-excerpt">{{ Str::limit(html_entity_decode(stripcslashes($blog->body)), 255) }}</div>
													<div class="blog-post-links">
														<a href="blog/{{ $blog->id }}" class="read-more-link">Read More</a>
													</div>
												</div>
											</div>
										</div>
									@endforeach
								@else

								@endif
							</div>
						</div>