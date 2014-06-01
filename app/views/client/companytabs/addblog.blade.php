<div class="comments block" id="addblog" style="display:none;">
            <div class="comment-message">
                <div id="page">
                    <center><h1>Add Blog</h1></center>
                    {{ Form::open([ 'id' => 'addBlogForm','method' => 'post', 'action' => 'BlogController@store', 'files' => true]) }}
                    <div>
                        {{ Form::label('title', "Blog Title", ["class"=> "text-colorful"]) }}<br>
                        {{ Form::text('title', '', ['class' => 'text-input-grey', 'placeholder' => 'Title', 'id' => 'addTitle', 'required']) }}
                        <br><br>
                    </div>

                    <div>
                        {{ Form::label('blogheader', "Blog Header", ["class"=> "text-colorful"]) }}<br>
                        {{ Form::file('blogheaderimage', ["id"=>"btn-blog-settings-logo"]) }}
                        <div class="render-blogheader-logo-preview">
                            <img src="" id="img-render-blogheaderimage">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('facebook', "Facebook",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('facebook','', [
                        "placeholder" => "Facebook Link", "class"=>"text-input-grey full", 'id' => 'addFacebook', 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('google', "Google+ Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('google','', [
                        "placeholder" => "Google+ Link", "class"=>"text-input-grey full", 'id' => 'addGoogle', 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('twitter', "Twitter Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('twitter','', [
                        "placeholder" => "Twitter Link", "class"=>"text-input-grey full", 'id' => 'addTwitter', 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('linkedin', "LinkedIn Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('linkedin','', [
                        "placeholder" => "LinkedIn Link", "class"=>"text-input-grey full", 'id' => 'addLinkedin', 'required']) }}
                    </div>
                    {{ Form::textarea('content', '<h3>Description of the Blog<h3>', ['id' => 'redactor1']) }}
                    <br>
                    <p><input id="addBlogButton" type="submit" value="Save" name="send" class="button-2-colorful"/>
                    <input id="cancel-blog" onclick="cancelBlog()" type="button" value="Cancel" class="button-2-colorful"></p>
                    {{ Form::close() }}
                </div>
            </div>

        </div>