$(document).ready(function() {
    list();
});

function list() {
    const token = localStorage.getItem('token');

    $.ajax({
        url: "/api/v1/articles",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Authorization' : 'Bearer ' + token
        },
        data: {
        },
        cache: false,
        success: function (data) {
            if (data.status == 'success') {
                let html = '';
                data.response.forEach((value, key) => {
                    html += `<li class="position-relative booking">
                                <div class="media">
                                    <div class="msg-img">
                                        <img src="/assets/images/profile-icon.svg" alt="profile_picture">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="mb-4">${value.title}<span class="badge badge-primary mx-3">${value.priority.name}</span></h5>
                                        <div class="mb-3">
                                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Published Date:</span>
                                            <span class="bg-light-blue">${value.published_at}</span>
                                        </div>
                                        <div class="mb-3">
                                            <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Author:</span>
                                          <span class="bg-light-blue">${value.author.first_name} ${value.author.last_name}</span>
                                        </div>
                                        <div class="mb-5">
${value.summary}
                                        </div>
                                        <a href="#" class="btn-gray">Show Article</a>
                                    </div>
                                </div>
                            </li>
                `;
                });
                $('#articles').html(html);
                return true;
            }

            $('.toast-body').html(data.message);
            $('.toast').toast('show');
            return false;
        },
        error: function (data) {
            const message = data.responseJSON.response.validation[0];
            $('.toast-body').html(message);
            $('.toast').toast('show');
        }
    });
}

