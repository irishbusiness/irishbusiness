<div id="company-tabs-blog" class="company-tabs-content" style="display: none;">
    <div class="portfolio-container container-24">

        <div class="blog-post block">
            <div class="block-title">
                <h1>Blog Settings</h1>
            </div>
        </div>

        <table class="table" id="table-categories">
            <thead>
            <tr>
                <th>Title</th>
                <th>Action</th>
                <th><a href="#company-tabs-blog" class="bs-btn btn-success btn-add-blog">Add new</a></th>
            </tr>
            </thead>
            <tbody>

            @if(isset($blogs) && !is_null($blogs))
            @foreach($blogs as $blog)
            <tr data-id="{{ $blog->id }}">
                <td><a href="blog/{{ $blog->id }}"><span class="category-name">{{ $blog->title }}</span></a></td>
                <td>
                    <a href="javascript:void(0)" class="bs-btn btn-info btn-edit-category" onclick="editBlog($(this))" data-id="{{ $blog->id }}">Edit</a>
                    <a href="javascript:void(0)" class="bs-btn btn-danger btn-delete-blog" data-id="{{ $blog->id }}">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>

        <!-- remarks for add form-->
        <div class="comments block" id="addblog" style="display:none;">
            <div class="comment-message">
                <div id="page">
                    <center><h1>Add Blog</h1></center>
                    {{ Form::open(array('method' => 'post', 'action' => 'BlogController@store', 'files' => true)) }}
                    <div>
                        {{ Form::label('title', "Title", ["class"=> "text-colorful"]) }}<br>
                        {{ Form::text('title', '', ['class' => 'text-input-grey', 'placeholder' => 'Title']) }}
                        <br><br>
                    </div>

                    <div>
                        {{ Form::label('blogheader', "Blog Header", ["class"=> "text-colorful"]) }}
                        {{ Form::file('blogheaderimage', ["id"=>"btn-blog-settings-logo"]) }}
                        <div class="render-blogheader-logo-preview">
                            <img src="" id="img-render-blogheaderimage">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('facebook', "Facebook",
                        ["class"=>"text-colorful"]) }}
                        {{ Form::text('facebook','', [
                        "placeholder" => "Facebook Link", "class"=>"text-input-grey full"]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('google', "Google+ Link",
                        ["class"=>"text-colorful"]) }}
                        {{ Form::text('google','', [
                        "placeholder" => "Google", "class"=>"text-input-grey full"]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('twitter', "Twitter Link",
                        ["class"=>"text-colorful"]) }}
                        {{ Form::text('twitter','', [
                        "placeholder" => "Twitter Link", "class"=>"text-input-grey full"]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('linkedin', "LinkedIn Link",
                        ["class"=>"text-colorful"]) }}
                        {{ Form::text('linkedin','', [
                        "placeholder" => "LinkedIn Link", "class"=>"text-input-grey full"]) }}
                    </div>
                    <textarea id="redactor1" name="content">
                        <h2>Hello and Welcome</h2>
                        <p>Sample Body Content</p>
                    </textarea>
                    <br>
                    <p><input type="submit" value="Save" name="send" class="button-2-colorful"/></p>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
        <!-- end of remark -->

        <!-- remarks for update/edit form -->
        <div class="comments block" id="editblog" style="display:none;">
            <div class="comment-message">
                <div id="page">
                    <center><h1>Edit Blog</h1></center>
                    {{ Form::open(array('method' => 'put', 'files' => true)) }}
                    <div>
                        {{ Form::label('title', "Title", ["class"=> "text-colorful"]) }}<br>
                        {{ Form::text('title', '', ['class' => 'text-input-grey', 'placeholder' => 'Title', 'id' => 'titleedit']) }}
                        <br><br>
                    </div>

                    <div>
                        {{ Form::label('blogheader', "Blog Header", ["class"=> "text-colorful"]) }}
                        {{ Form::file('blogheaderimage', ["id"=>"btn-editblog-settings-logo"]) }}
                        <div class="render-blogheader-logo-preview">
                            <img src="" id="img-render-blogheaderimage">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('facebook', "Facebook",
                        ["class"=>"text-colorful"]) }}
                        {{ Form::text('facebook','', [
                        "placeholder" => "Facebook Link", "class"=>"text-input-grey full", 'id' => 'facebookedit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('google', "Google+ Link",
                        ["class"=>"text-colorful"]) }}
                        {{ Form::text('google','', [
                        "placeholder" => "Google", "class"=>"text-input-grey full", 'id' => 'googleedit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('twitter', "Twitter Link",
                        ["class"=>"text-colorful"]) }}
                        {{ Form::text('twitter','', [
                        "placeholder" => "Twitter Link", "class"=>"text-input-grey full", 'id' => 'twitteredit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('linkedin', "LinkedIn Link",
                        ["class"=>"text-colorful"]) }}
                        {{ Form::text('linkedin','', [
                        "placeholder" => "LinkedIn Link", "class"=>"text-input-grey full", 'id' => 'linkedinedit']) }}
                    </div>
                    <div id="redactorplaceholder">
                        </div>

                    <br>
                    <p><input type="submit" value="Save" name="send" class="button-2-colorful"/></p>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
        <!-- end of remark-->
    </div>
</div>