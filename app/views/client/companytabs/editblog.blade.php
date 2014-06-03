<div class="comments block" id="editblog" style="display:none;">
            <div class="comment-message">
                <div id="page">
                    <center><h1>Edit Blog</h1></center>
                    {{ Form::open([ 'id' => 'editBlogForm', 'method' => 'post', 'files' => true ]) }}
                    <div>
                        {{ Form::label('title', "Blog Title", ["class"=> "text-colorful"]) }}<br>
                        {{ Form::text('title', '', ['class' => 'text-input-grey', 'placeholder' => 'Blog Title', 'id' => 'titleedit']) }}
                        <br><br>
                    </div>

                    <div>
                        {{ Form::label('blogheader', "Blog Header", ["class"=> "text-colorful"]) }}<br>
                        {{ Form::file('blogheaderimageedit', ["id"=>"btn-editblog-settings-logo"]) }}
                        <div class="render-blogheader-logo-preview">
                            <img src="" id="img-render-blogheaderimageedit">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('facebook', "Facebook",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('facebook','', [
                        "placeholder" => "Facebook Link", "class"=>"text-input-grey full", 'id' => 'facebookedit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('google', "Google+ Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('google','', [
                        "placeholder" => "Google", "class"=>"text-input-grey full", 'id' => 'googleedit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('twitter', "Twitter Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('twitter','', [
                        "placeholder" => "Twitter Link", "class"=>"text-input-grey full", 'id' => 'twitteredit']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('linkedin', "LinkedIn Link",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('linkedin','', [
                        "placeholder" => "LinkedIn Link", "class"=>"text-input-grey full", 'id' => 'linkedinedit']) }}
                    </div>
                    <div id="redactorplaceholder">
                    </div>
                     <div class="form-group">
                        {{ Form::label('blogurl', "Blog URL (".Request::root()."/your-blog-name)",
                        ["class"=>"text-colorful"]) }}<br>
                        {{ Form::text('blogurl','', [
                        "placeholder" => "your-blog-name ( Optional )", "class"=>"text-input-grey full", 'id' => 'editblogurl', 'required']) }}
                    </div>
                    <br>
                    <p><input type="submit" value="Save" name="send" class="button-2-colorful"/>
                    <input id="cancel-blog-edit" data-id="" data-title="" onclick="cancelBlog()" type="button" value="Cancel" class="button-2-colorful"></p>
                    {{ Form::close() }}
                </div>
            </div>

        </div>