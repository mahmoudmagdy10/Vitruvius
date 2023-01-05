$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('body').on('click','#add_comment',function(e){
        e.preventDefault();
        var formData = new FormData($('#comment_form')[0]);
        var project_id = $('.project_id').val();
        let myUrl = 'http://localhost:8000/add_comment/'+project_id;


        $.ajax({
            type:'POST',
            enctype:'multipart/form-data',
            url:myUrl,
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            success: function (data) {
                var commentContainer = $('.comment_container');
                var addedComment =`
                <div class="singleComment">
                    <div class="comment">
                        <span class="h_3">${data.user.name}</span>
                        <span class="time">${data.comment.created_at}</span>
                        <i class="fas fa-star icon_star "></i>
                        <div class="old_comment" data-old-comment-id="comment-${data.comment.id}">
                            <div class="content">${data.comment.content}</div>
                            <div class="commentButtons">
                                <a data-reply="comment-${data.comment.id}">Reply</a> |
                                <a data-id="comment-${data.comment.id}">Edit</a>|
                                <a>Delete</a>
                            </div>
                        </div>
                        <div id="new_comment" data-new-comment-id="comment-${data.comment.id}" class="new_comment">
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group add">
                                    <div>
                                        <label for="exampleInputEmail1">Edit Comment</label>
                                        <textarea name ="comment" class="form-control" aria-label="With textarea">${data.comment.content}</textarea>
                                    </div>
                                    <div class="editCommentButtons">
                                        <input  class="btn btn-primary" type="submit" value="Update">
                                        <button class="cancel btn btn-danger" data-cancel="comment-${data.comment.id}" type="button">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="reply">

                        //@foreach($item->replies as $reply)
                        @isset($reply)
                        <div>
                            <span class="h3_reply"></span>
                            <span class="time"></span>
                            <div class="content"></div>
                        </div>
                        @endisset
                        //@endforeach

                        <!-- Add reply -->
                        <div class="add_reply" data-reply="comment-{{$item->id}}">
                            <form id="reply_form" action="" method="POST">
                                @csrf
                                <input id="comment_id"  type="hidden" value="{{$item->id}}"></input>
                                <div class="form-group add ">
                                    <div>
                                        <label for="exampleInputEmail1" style="margin-bottom:5px;">Reply</label>
                                        <textarea name ="reply" class="form-control reply_field" aria-label="With textarea"></textarea>
                                    </div>
                                    <div class="addReplyButtons">
                                        <input id="add_reply" class="btn btn-primary" type="submit" value="Send"></input>
                                        <button class="btn btn-danger" data-cancelreply="comment-{{$item->id}}" type="button">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Add reply -->
                    </div>
                </div>`;
                $('#commentArea').text('');
                commentContainer.append(addedComment);
            },
            error:function(reject){
                console.log("No Response");
            }
        })
    });


    $(document).on('click','#updateComment',function(e){

        e.preventDefault();
        let form = this.closest("form");
        var newData = new FormData(form);
        var comment_id = $(".comment_id",form).val();
        let myUrl = 'http://localhost:8000/update_comment/'+comment_id;


        $.ajax({
            type:'post',
            enctype:'multipart/form-data',
            url:myUrl,
            data:newData,
            processData:false,
            contentType:false,
            cache:false,
            success:function(data){
                console.log(data);
                var oldEditComment = $(`[data-old-comment-id='comment-${comment_id}']`);
                var newEditComment = $(`[data-new-comment-id='comment-${comment_id}']`);
                $(`[data-old-comment-id='comment-${comment_id}'] .content`).remove();

                newEditComment.css("display", "none");
                oldEditComment.prepend(`<div class="content">${data.content}</div>`);
                oldEditComment.css("display", "block");

                // console.log(oldEditContent);
            },
            error:function(reject){
                console.log("No Response");

            }
        })

    });

    $(document).on('click','[data-delete]',function(e){

        e.preventDefault();
        let form = this.closest('.old_comment');
        var comment_id = $("[data-delete]",form).data('delete');
        let singleCommet = this.closest(`[data-comment='${comment_id}']`);
        let myUrl = 'http://localhost:8000/delete_comment/'+comment_id;


        $.ajax({
            type:'get',
            url:myUrl,
            processData:false,
            contentType:false,
            cache:false,
            success:function(data){
                console.log(data);
                singleCommet.remove();
            },
            error:function(reject){
                console.log("No Response");

            }
        })

    });


});
