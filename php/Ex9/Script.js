// JavaScript code (reorganized for better readability)
const API_KEY = '651443c864575f4d83403790';

async function fetchData(url) {
    const response = await fetch(url, {
        headers: {
            'app-id': API_KEY
        }
    });
    return await response.json();
}

async function listUsers() {
    const users = await fetchData('https://dummyapi.io/data/v1/user?limit=10');
    const userList = document.getElementById('userList');
    userList.innerHTML = '<table border="1"><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Picture</th></tr>' + users.data.map(user => `<tr><td>${user.id}</td><td>${user.firstName}</td><td>${user.lastName}</td><td><img src="${user.picture}" width="100" height="100"></td></tr>`).join('') + '</table>';
}

async function getUserProfile() {
    const userId = document.getElementById('userId').value;
    const user = await fetchData(`https://dummyapi.io/data/v1/user/${userId}`);
    const userProfile = document.getElementById('userProfile');
    userProfile.innerHTML = `
        <h3>User Profile</h3>
        <p><strong>ID:</strong> ${user.id}</p>
        <p><strong>First Name:</strong> ${user.firstName}</p>
        <p><strong>Last Name:</strong> ${user.lastName}</p>
        <p><strong>Email:</strong> ${user.email}</p>
        <p><strong>Gender:</strong> ${user.gender}</p>
        <p><strong>Registered:</strong> ${new Date(user.registered).toLocaleDateString()}</p>
        <p><strong>Phone:</strong> ${user.phone}</p>
        <p><strong>Location:</strong> ${user.location.street}, ${user.location.city}, ${user.location.state}, ${user.location.country}</p>
        <img src="${user.picture}" alt="${user.firstName}" width="150" height="150">
    `;
}

async function listUserPosts() {
    const userId = document.getElementById('userPostsId').value;
    const posts = await fetchData(`https://dummyapi.io/data/v1/user/${userId}/post`);
    const userPosts = document.getElementById('userPosts');
    userPosts.innerHTML = '<h3>User Posts</h3>' + posts.data.map(post => `<p><strong>ID:</strong> ${post.id}</p><p><strong>Text:</strong> ${post.text}</p><hr>`).join('');
}

async function listPosts() {
    const posts = await fetchData('https://dummyapi.io/data/v1/post');
    const postList = document.getElementById('postList');
    postList.innerHTML = '<h3>Posts</h3>' + posts.data.map(post => `<p><strong>ID:</strong> ${post.id}</p><p><strong>Text:</strong> ${post.text}</p><hr>`).join('');
}

async function listPostComments() {
    const postId = document.getElementById('postId').value;
    const comments = await fetchData(`https://dummyapi.io/data/v1/post/${postId}/comment`);
    const postComments = document.getElementById('postComments');
    postComments.innerHTML = '<h3>Post Comments</h3>' + comments.data.map(comment => `<p><strong>ID:</strong> ${comment.id}</p><p><strong>Text:</strong> ${comment.message}</p><hr>`).join('');
}

// Optionally, you can add event listeners for the input fields to trigger actions on Enter key press.
const inputFields = document.querySelectorAll('input[type="text"]');
inputFields.forEach(input => {
    input.addEventListener('keyup', function (event) {
        if (event.key === 'Enter') {
            // Determine which function to call based on the input field's ID and trigger the corresponding action.
            switch (input.id) {
                case 'userId':
                    getUserProfile();
                    break;
                case 'userPostsId':
                    listUserPosts();
                    break;
                case 'postId':
                    listPostComments();
                    break;
                default:
                    break;
            }
        }
    });
});