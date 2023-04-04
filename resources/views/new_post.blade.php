<div class="card p-4 bg-light hoverableCard" id="{{$current_post->id}}">
    <div class="media d-flex flex-column gap-4">
        <div class="d-flex align-items-start justify-content-between gap-2">
            <div class="d-flex align-items-center gap-2">
                <img class="mr-3 rounded-circle" src="https://i.pinimg.com/564x/90/20/2a/90202add028b5fc5fd0474c613b95403.jpg" alt="Profile Image" width="50">
                <div style="display: flex; flex-direction: column; gap: .4rem;">
                    <h5 class="mt-0 fw-bold" style="font-size: .7rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end: 0px;">{{$current_post->fname." ".$current_post->lname}}</h5>
                    <p style="font-size: .5rem; margin-bottom: 0; margin-block-start: 0; margin-block-end: 0; margin-inline-start: 0px; margin-inline-end: 0px;">{{ \Carbon\Carbon::parse($current_post->created_at)->format('M d, Y')}}</p>
                </div>
            </div>

            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><button class="dropdown-item" onclick="handleDeletePost('{{$current_post->id}}')">DELETE</button></li>
                </ul>
            </div>
        </div>
        <div class="media-body">
            <p class="" style="font-size: .6rem; margin-bottom: 0;">
                {{$current_post->post}}
            </p>
        </div>
    </div>
</div>