@extends('layout.app')

@section('link')
    <link rel="stylesheet" href="{{asset('css/Customer/details.css')}}">
@endsection

@section('title')
    Project Details
@endsection

@section('content')
    <!-- ========================  Properties Table  ============================== -->

    <div class="title">
        <div data-aos="fade-up" data-aos-delay="150" class="container">
            @foreach($project as $details)
            <div class="projects">
                <div data-aos="fade-up" data-aos-delay="150" class="card">
                    <div class="box">
                        <div class="det">
                            <h3>Architecture Style</h3>
                            <h3 style="color:#004761e0;font-weight:bold;">{{ $details->arch }}</h3>

                            @if($details->arch === 'Italian')
                            <div class="fram">
                            <iframe title="Petrovsky travel palace in Moscow" frameborder="0" allowfullscreen
                                mozallowfullscreen="true" webkitallowfullscreen="true"
                                allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                                execution-while-out-of-viewport execution-while-not-rendered web-share
                                src="https://sketchfab.com/models/8b877b1776794c139d80fd93999003f0/embed"> </iframe>
                            </div>
                            @endif
                            @if($details->arch === 'American')
                            <div class="fram">
                            <iframe src="https://sketchfab.com/models/8b877b1776794c139d80fd93999003f0/embed"> </iframe>
                            </div>
                            @endif
                            @if($details->arch === 'UK')
                            <div class="fram">
                            <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                                mozallowfullscreen="true" webkitallowfullscreen="true"
                                allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                                execution-while-out-of-viewport execution-while-not-rendered web-share
                                src="https://sketchfab.com/models/e4869a806dfa4efd9d480fda16990c52/embed"> </iframe>
                            </div>
                            @endif
                            @if($details->arch === 'german')
                            <div class="fram">
                            <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                                mozallowfullscreen="true" webkitallowfullscreen="true"
                                allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                                execution-while-out-of-viewport execution-while-not-rendered web-share
                                src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed"> </iframe>
                            </div>
                            @endif
                            @if($details->arch === 'spanish')
                            <div class="fram">
                            <iframe title="Ndecor Design Dokuzer İnşaat 3D" frameborder="0" allowfullscreen
                                mozallowfullscreen="true" webkitallowfullscreen="true"
                                allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking
                                execution-while-out-of-viewport execution-while-not-rendered web-share
                                src="https://sketchfab.com/models/80782c1ce7d34c04ac193e918978c009/embed"> </iframe>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if($user->type == "Contractor")
                @foreach($details->props as $prop)
                {{-- @if(!($payment->isEmpty())) --}}
                <div class="verified">
                    <p><i class="fa fa-check-circle" aria-hidden="true"></i> Payment verified</p>
                    <span>${{ number_format($prop->PREDICTION) }}+ spent</span>
                </div>
                {{-- @endif --}}
                {{-- @if($payment->isEmpty()) --}}
                <div class="unverified">
                    <p><i class="fa fa-times-circle" aria-hidden="true"></i> Payment unverified</p>
                    <span>$0 spent</span>
                </div>
                {{-- @endif --}}
                @endforeach
                @endif
            </div>
            <div class="table">
                <table>
                @foreach($details->props as $prop)
                <tr>
                    <th>#</th>
                    <th>Properity</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td style="color :#f44336;">PREDICTION</td>
                    <td style="color :#5a3528;font-weight: bold;">{{ number_format($prop->PREDICTION)}} $</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td style="color :#f44336;">OverallQual</td>
                    <td>{{$prop->OverallQual}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td style="color :#f44336;">Neighborhood</td>
                    <td>{{$prop->Neighborhood}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td style="color :#f44336;">GrLivArea</td>
                    <td>{{$prop->GrLivArea}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td style="color :#f44336;">GarageCars</td>
                    <td>{{$prop->GarageCars}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td style="color :#f44336;">BsmtQual</td>
                    <td>{{$prop->BsmtQual}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td style="color :#f44336;">ExterQual</td>
                    <td>{{$prop->ExterQual}}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td style="color :#f44336;">GarageArea</td>
                    <td>{{$prop->GarageArea}}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td style="color :#f44336;">KitchenQual</td>
                    <td>{{$prop->KitchenQual}}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td style="color :#f44336;">OverallQual</td>
                    <td>{{$prop->OverallQual}}</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td style="color :#f44336;">YearBuilt</td>
                    <td>{{$prop->YearBuilt}}</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td style="color :#f44336;">TotalBsmtSF</td>
                    <td>{{$prop->TotalBsmtSF}}</td>
                </tr>
                </table>
                <table class="continue">
                <tr>
                    <td>13</td>
                    <td style="color :#f44336;">FirstFlrSF</td>
                    <td>{{$prop->FirstFlrSF}}</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td style="color :#f44336;">GarageFinish</td>
                    <td>{{$prop->GarageFinish}}</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td style="color :#f44336;">FullBath</td>
                    <td>{{$prop->FullBath}}</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td style="color :#f44336;">YearRemodAdd</td>
                    <td>{{$prop->YearRemodAdd}}</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td style="color :#f44336;">GarageType</td>
                    <td>{{$prop->GarageType}}</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td style="color :#f44336;">FireplaceQu</td>
                    <td>{{$prop->FireplaceQu}}</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td style="color :#f44336;">Foundation</td>
                    <td>{{$prop->Foundation}}</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td style="color :#f44336;">MSSubClass</td>
                    <td>{{$prop->MSSubClass}}</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td style="color :#f44336;">TotRmsAbvGrd</td>
                    <td>{{$prop->TotRmsAbvGrd}}</td>
                </tr>
                <tr>
                    <td>22</td>
                    <td style="color :#f44336;">Fireplaces</td>
                    <td>{{$prop->Fireplaces}}</td>
                </tr>
                <tr>
                    <td>23</td>
                    <td style="color :#f44336;">Created At</td>
                    <td>{{$details->created_at->format('d-m-Y h:i')}}</td>
                </tr>
                @endforeach

                </table>
            </div>
            @endforeach
        </div>
    </div>
    <!-- ========================  2D File ============================== -->
    @isset($user)
    @foreach($project as $pro)
        <div class="slide_show">
            <img class="d-block w-100" src='{{ url("storage/images/files_2D/$pro->file2D_path") }}'  alt="First slide">
        </div>
    @endforeach
    @endisset
    <!-- =======================  comment-system ========================= -->

    <div class="comment-system">
        <div class="comment_container">
            <h3>Comments</h3>
            @foreach($comments as $item)
            <input type="hidden" class="item" value="{{$item}}">
            <div class="singleComment" data-comment={{$item->id}}>
                {{-- Start Comment --}}
                <div class="comment">

                    <span class="h_3">{{ $item->users->name }}</span>
                    <span class="time"> {{ $item->created_at->format('d-m-Y h:i') }}</span>
                    <i class="fas fa-star icon_star "></i>

                    <div class="old_comment" data-old-comment-id="comment-{{$item->id}}">
                        <div class="content">{{  ucfirst($item->content) }}</div>
                        <div class="commentButtons">
                            <a data-reply="comment-{{$item->id}}">Reply</a>
                            @if($item->user_id == Auth::user()->id)
                            | <a data-id="comment-{{$item->id}}">Edit</a>
                            | <a id="deleteComment" data-delete="{{$item->id}}">Delete</a>
                            @endif
                        </div>
                    </div>

                    <div id="new_comment" data-new-comment-id="comment-{{$item->id}}" class="new_comment">
                        <form id="editForm">
                            @csrf()
                            <div class="form-group add">
                                <input type="hidden" class="comment_id" value="{{ $item->id }}"/>
                                <div>
                                    <label for="exampleInputEmail1">Edit Comment</label>
                                    <textarea name ="comment" class="form-control" aria-label="With textarea">{{  ucfirst($item->content) }}</textarea>
                                </div>
                                <div class="editCommentButtons">
                                    <input id="updateComment" data-update="{{$item->id}}" class="btn btn-primary" type="submit" value="Update">
                                    <button class="cancel btn btn-danger" data-cancel="comment-{{$item->id}}" type="button">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                {{-- Start Reply --}}
                <div class="reply" >

                    @foreach($item->replies as $reply)
                    @isset($reply)
                    <div data-replyContainer="{{$reply->id}}">
                        <span class="h3_reply">{{ $reply->users->name }}</span>
                        <span class="time">{{ $reply->created_at->format('d-m-Y h:i') }}</span>

                        <div class="old_reply" data-old-reply-id="reply-{{$reply->id}}">
                            <div class="content">{{ ucfirst($reply->content) }}</div>
                            <div class="replyButtons">
                                @if($reply->user_id == Auth::user()->id)
                                <a data-editReply="reply-{{$reply->id}}">Edit</a>|
                                <a id="deleteReply" data-deleteReply="{{$reply->id}}">Delete</a>
                                @endif
                            </div>
                        </div>

                        <div id="new_reply" data-new-reply-id="reply-{{$reply->id}}" class="new_reply">
                            <form id="editReply">
                                @csrf()
                                <div class="form-group add">
                                    <input type="hidden" class="comment_id" value="{{ $item->id }}"/>
                                    <input type="hidden" class="reply_id" value="{{ $reply->id }}"/>
                                    <div>
                                        <label for="exampleInputEmail1">Edit Comment</label>
                                        <textarea name ="reply" class="form-control" aria-label="With textarea">{{  ucfirst($reply->content) }}</textarea>
                                    </div>
                                    <div class="editReplyButtons">
                                        <input id="updateReply" data-updateReply="{{$reply->id}}" class="btn btn-primary" type="submit" value="Update">
                                        <button class="cancel btn btn-danger" data-cancelreply="reply-{{$reply->id}}" type="button">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    @endisset
                    @endforeach
                </div>
                <!-- Add reply -->
                <div class="add_reply" data-reply="comment-{{$item->id}}">
                    <form id="reply_form">
                        @csrf
                        <div class="form-group add ">
                            <input type="hidden" name="project_id" class="project_id" value="{{$project_id}}">
                            <input type="hidden" name="comment_id" class="comment_id" value="{{$item->id}}">
                            <div>
                                <label for="exampleInputEmail1" style="margin-bottom:5px;">Reply</label>
                                <textarea name ="reply" class="form-control reply_field" aria-label="With textarea"></textarea>
                            </div>
                            <div class="addReplyButtons">
                                <input data-addReply="{{ $item->id}}" class="btn btn-primary" type="submit" value="Send"></input>
                                <button class="btn btn-danger" data-cancelreply="comment-{{$item->id}}" type="button">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Add reply -->
            </div>
            @endforeach
        </div>
        <!-- Add Comment -->
        {{-- @if( $comment->isEmpty() ) --}}
        <form id="comment_form">
            @csrf()
            <div class="form-group add">
                <input type="hidden" class="project_id" value="{{ $project_id }}"/>
                <div>
                    <label for="exampleInputEmail1">Add Comment</label>
                    <textarea id="commentArea" name ="comment" class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div class="addReplyButtons">
                    <input id="add_comment" class="btn btn-primary" type="submit" value="Send">
                </div>
            </div>
        </form>
        {{-- @endif --}}
        {{-- <!-- Add Comment --> --}}
    </div>
@endsection

@section('script')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src=" {{asset('js/Comment/details.js')}}"></script>
{{-- <script src=" {{asset('js/Comment/comment_buttons.js')}}"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
// <----------------------------------------  Comment Ajax  ------------------------------------------------------->

        $('body').on('click','#add_comment',function(e){
            e.preventDefault();
            var formData = new FormData($('#comment_form')[0]);

            $.ajax({
                type:'POST',
                enctype:'multipart/form-data',
                url:"{{route('add_comment',$project_id)}}",
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
                    </div>`;
                    $('#commentArea').text('');
                    commentContainer.append(addedComment);
                },
                error:function(reject){
                    console.log("No Response");
                }
            })
        });
//                  *****************************************************


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
//                  *****************************************************

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

// <----------------------------------------  Reply Ajax  -------------------------------------------------------->
        $(document).on('click','[data-addReply]',function(e){
            e.preventDefault();
            let form = this.closest("form");
            var replyData = new FormData(form);
            let comment_id = $('.comment_id',form).val();
            let myUrl = 'http://localhost:8000/add_reply';

            $.ajax({
                type:'POST',
                enctype:'multipart/form-data',
                url:myUrl,
                data:replyData,
                processData:false,
                contentType:false,
                cache:false,
                success: function (data) {
                    var replyContainer = $(`[data-comment='${comment_id}'] .reply`);
                    var ajaxReply = `
                        <div>
                            <span class="h3_reply">${data.user.name}</span>
                            <span class="time">${data.reply.created_at}</span>

                            <div class="old_reply" data-old-reply-id="reply-${data.reply.id}">
                                <div class="content">${data.reply.content}</div>
                                <div class="replyButtons">
                                    <a data-editReply="reply-${data.reply.id}">Edit</a>|
                                    <a id="deleteComment" data-delete="${data.reply.id}">Delete</a>
                                </div>
                            </div>

                            <div id="new_reply" data-new-reply-id="reply-${data.reply.id}" class="new_reply">
                                <form id="editReply">
                                    @csrf()
                                    <div class="form-group add">
                                        <input type="hidden" class="comment_id" value="${data.comment.id}"/>
                                        <div>
                                            <label for="exampleInputEmail1">Edit Comment</label>
                                            <textarea name ="reply" class="form-control" aria-label="With textarea">${data.reply.content}</textarea>
                                        </div>
                                        <div class="editReplyButtons">
                                            <input id="updateReply" data-update="${data.reply.id}" class="btn btn-primary" type="submit" value="Update">
                                            <button class="cancel btn btn-danger" data-cancelreply="reply-${data.reply.id}" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        `;
                        replyContainer.append(ajaxReply);
                },
                error:function(reject){
                    console.log("No Response");
                }
            })
        });
//                  *****************************************************
        $(document).on('click','[data-deleteReply]',function(e){

            e.preventDefault();
            let form = this.closest('.replyButtons');
            var reply_id = $("[data-deletereply]",form).data('deletereply');
            let singleReply = this.closest(`[data-replyContainer='${reply_id}']`);
            let myUrl = 'http://localhost:8000/delete_reply/'+reply_id;

            $.ajax({
                type:'get',
                url:myUrl,
                processData:false,
                contentType:false,
                cache:false,
                success:function(data){
                    console.log(data);
                    singleReply.remove();
                },
                error:function(reject){
                    console.log("No Response");

                }
            })

        });
//                  *****************************************************

        $(document).on('click','#updateReply',function(e){

            e.preventDefault();
            let form = this.closest("form");
            var newData = new FormData(form);
            var reply_id = $(".reply_id",form).val();
            var textarea = $("textarea",form);
            let myUrl = 'http://localhost:8000/update_reply/'+reply_id;
            textarea.text('');


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
                    var oldEditReply = $(`[data-old-reply-id='reply-${reply_id}']`);
                    var newEditReply = $(`[data-new-reply-id='reply-${reply_id}']`);
                    $(`[data-old-reply-id='reply-${reply_id}'] .content`).remove();

                    newEditReply.css("display", "none");
                    oldEditReply.prepend(`<div class="content">${data.content}</div>`);
                    oldEditReply.css("display", "block");

                    // console.log(oldEditContent);
                    console.log(textarea);
                },
                error:function(reject){
                    console.log("No Response");

                }
            })


        });

    });

</script>

@endsection
