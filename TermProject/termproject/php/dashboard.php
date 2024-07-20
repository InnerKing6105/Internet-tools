<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user = getUserById($user_id);
$username = $user['username'];

$title = "Fitness Dashboard";
include '../includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<style>
        body {
            background-image: url("../pics/Tread.jpeg");
            background-repeat: no-repeat;
            background-size: cover;
        }

</style> 

<body>
<div class="container mt-5">
    <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
    <p>This is your fitness dashboard.</p>

    <h3>Log New Activity</h3>
<form id="activityForm">
    <div class="form-group">
        <label for="activity_type" style="color: #ff6347;">Activity Type:</label>
        <input type="text" class="form-control" id="activity_type" name="activity_type" required>
    </div>
    <div class="form-group">
        <label for="duration" style="color: #ff6347;">Duration (minutes):</label>
        <input type="number" class="form-control" id="duration" name="duration" required>
    </div>
    <div class="form-group">
        <label for="distance" style="color: #ff6347;">Distance (km):</label>
        <input type="number" class="form-control" id="distance" name="distance" step=".01">
    </div>
    <div class="form-group">
        <label for="intensity" style="color: #ff6347;">Intensity:</label>
        <input type="text" class="form-control" id="intensity" name="intensity">
    </div>
    <div class="form-group">
        <label for="notes" style="color: #ff6347;">Notes:</label>
        <textarea class="form-control" id="notes" name="notes"></textarea>
    </div>
    <div class="form-group">
        <label for="date" style="color: #ff6347;">Date:</label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>
    <button type="submit" class="btn btn-primary">Log Activity</button>
</form>


    <h3 style="color: white">Your Activities</h3>
    <div id="activitiesList" class="activities-list"></div>
</div>

<div class="badges-container">
    <h3>Your Badges</h3>
    <div id="badgesList"></div>
</div>

<script>
document.getElementById('activityForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    
    fetch('log_activity.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Activity logged successfully!');
            loadActivities();
        } else {
            alert('Error logging activity: ' + (data.error || 'Unknown error'));
        }
    })
    .catch(error => console.error('Error:', error));
});

function deleteActivity(activityId) {
    if (confirm('Are you sure you want to delete this activity?')) {
        fetch('delete_activity.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: activityId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Activity deleted successfully!');
                loadActivities();
            } else {
                console.error('Error deleting activity:', data.error);
                alert('Error deleting activity: ' + (data.error || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
    }
}

function loadActivities() {
    fetch('get_activities.php')
    .then(response => response.json())
    .then(data => {
        let activitiesList = document.getElementById('activitiesList');
        activitiesList.innerHTML = '';

        data.activities.forEach(activity => {
            let activityCard = document.createElement('div');
            activityCard.classList.add('activity-card');
            activityCard.innerHTML = `
                <h4 style="color: white">${activity.activity_type}</h4>
                <div class="activity-details">
                    <p style="color: white"><strong>Duration:</strong> ${activity.duration_minutes} minutes</p>
                    <p style="color: white"><strong>Distance:</strong> ${activity.distance_km} km</p>
                    <p style="color: white"><strong>Intensity:</strong> ${activity.intensity}</p>
                    <p style="color: white"><strong>Date:</strong> ${activity.date}</p>
                    <p style="color: white"><strong>Notes:</strong> ${activity.notes}</p>
                </div>
                <div class="activity-actions">
                    <button onclick="deleteActivity(${activity.id})">Delete</button>
                </div>
            `;
            activitiesList.appendChild(activityCard);
        });
    })
    .catch(error => console.error('Error:', error));
}

function loadBadges() {
    fetch('get_badges.php')
    .then(response => response.json())
    .then(data => {
        let badgesList = document.getElementById('badgesList');
        badgesList.innerHTML = '';

        data.forEach(badge => {
            let badgeDiv = document.createElement('div');
            badgeDiv.classList.add('badge');
            badgeDiv.innerHTML = `
                <img src="${badge.image}" alt="${badge.name}" title="${badge.description}">
                <p>${badge.name}</p>
                <p>${badge.description}</p>
            `;
            badgesList.appendChild(badgeDiv);
        });
    })
    .catch(error => console.error('Error:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    loadActivities();
    loadBadges();
});
</script>

</body>
</html>

