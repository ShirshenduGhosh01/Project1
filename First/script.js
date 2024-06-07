document.getElementById('submitForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var studentName = document.getElementById('studentName').value;
    var complaintText = document.getElementById('complaint').value;
    addComplaint(studentName, complaintText);
    document.getElementById('submitForm').reset();
});

function addComplaint(studentName, complaintText) {
    var complaintsList = document.getElementById('complaints');
    var listItem = document.createElement('li');
    listItem.className = 'complaint-item';
    listItem.innerHTML = '<h3>' + studentName + '</h3><p>' + complaintText + '</p>';
    complaintsList.appendChild(listItem);
}
