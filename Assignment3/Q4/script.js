// Initialize the DOM once it's loaded
document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById('subjectsContainer');
    // Generate 5 inputs dynamically
    for (let i = 1; i <= 5; i++) {
        container.innerHTML += `
            <div class="input-group">
                <label>Subject ${i}</label>
                <input type="number" id="sub${i}" min="0" max="100" placeholder="0">
                <div class="subject-result" id="res${i}">--</div>
            </div>
        `;
    }
});

// Calculate Grade and Grade Point based on marks
function getGradeInfo(marks) {
    if (marks >= 90) return { grade: 'A+', point: 10 };
    if (marks >= 80) return { grade: 'A', point: 9 };
    if (marks >= 70) return { grade: 'B', point: 8 };
    if (marks >= 60) return { grade: 'c', point: 7 };
    if (marks >= 50) return { grade: 'D', point: 6 };
    if (marks >= 40) return { grade: 'E', point: 5 };
    return { grade: 'F', point: 0 };
}

// Main logic triggered by the button
function calculateSGPA() {
    const card = document.getElementById('calcCard');
    const errorBox = document.getElementById('errorBox');
    const finalBox = document.getElementById('finalResult');
    
    let totalMarks = 0;
    let totalPoints = 0;
    let hasFailed = false;
    let hasError = false;

    // Reset styles
    card.classList.remove('theme-pass', 'theme-fail');
    errorBox.style.display = 'none';
    finalBox.style.display = 'none';

    // Process each subject
    for (let i = 1; i <= 5; i++) {
        const inputVal = document.getElementById(`sub${i}`).value;
        const marks = parseFloat(inputVal);

        // Validation (Requirement i)
        if (inputVal === "" || isNaN(marks) || marks < 0 || marks > 100) {
            hasError = true;
            break;
        }

        // Calculate grades (Requirement ii)
        const info = getGradeInfo(marks);
        document.getElementById(`res${i}`).innerText = `Grade: ${info.grade} (${info.point})`;
        
        totalMarks += marks;
        totalPoints += info.point;
        if (info.grade === 'F') hasFailed = true;
    }

    // Handle errors
    if (hasError) {
        errorBox.innerText = "Please enter valid marks between 0 and 100 for all subjects.";
        errorBox.style.display = 'block';
        return;
    }

    // Compute final results (Requirement iii)
    const percentage = (totalMarks / 500) * 100;
    const sgpa = totalPoints / 5; 

    // Update DOM
    document.getElementById('outTotal').innerText = `${totalMarks} / 500`;
    document.getElementById('outPercent').innerText = `${percentage.toFixed(2)}%`;
    document.getElementById('outSGPA').innerText = sgpa.toFixed(2);

    // Apply dynamic styling based on result (Requirement iv)
    if (hasFailed) {
        card.classList.add('theme-fail');
        document.getElementById('outStatus').innerText = "Result: FAIL";
    } else {
        card.classList.add('theme-pass');
        document.getElementById('outStatus').innerText = "Result: PASS";
    }

    // Show the results container
    finalBox.style.display = 'block';
}