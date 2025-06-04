$(document).ready(function () {
    // Like AJAX
    $('.like-btn').click(function () {
        const postId = $(this).data('post-id');
        $.post('like.php', { post_id: postId }, function () {
            $.get('like.php', { fetch_count: postId }, function (data) {
                $('#like-count-' + postId).text(data);
            });
        });
    });

    // Comment AJAX
    $('.comment-form').submit(function (e) {
        e.preventDefault();
        const form = $(this);
        const postId = form.data('post-id');
        const input = form.find('input[name="comment"]');
        const commentText = input.val();

        $.post('comment.php', {
            post_id: postId,
            comment: commentText
        }, function () {
            input.val('');
            $('#comments-' + postId).load('fetch_comments.php?post_id=' + postId);
        });
    });
});

function fetchNotifications() {
    $.get("fetch_notifications.php", function(data) {
        $("#notification-container").html(data);
    });
}

setInterval(fetchNotifications, 10000); // Toutes les 10 secondes
fetchNotifications();

// Marquer comme lues au clic
$('#notification-container').on('click', function () {
    $.post('mark_notifications.php');
    $(this).html('');
});

