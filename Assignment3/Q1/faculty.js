// Expanded database with realistic AI-generated face placeholders
const facultyDatabase = [
    {
        name: "Dr. Sekhar Mandal",
        photo: "https://xsgames.co/randomusers/assets/avatars/male/12.jpg",
        email: "sekhar@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Database Management Systems, Software Engineering",
        research: "Image Processing, Pattern Recognition"
    },
    {
        name: "Dr. Prasun Ghosal",
        photo: "https://xsgames.co/randomusers/assets/avatars/male/45.jpg",
        email: "pghosal@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Operating Systems, Computer Architecture",
        research: "VLSI Design, Embedded Systems, AI"
    },
    {
        name: "Dr. Asit Kumar Das",
        photo: "https://xsgames.co/randomusers/assets/avatars/male/74.jpg",
        email: "akdas@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Data Structures, Algorithm Analysis",
        research: "Bioinformatics, Machine Learning, Data Mining"
    },
    {
        name: "Dr. Sipra Das Bit",
        photo: "https://xsgames.co/randomusers/assets/avatars/female/22.jpg",
        email: "sdasbit@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Computer Networks, Mobile Computing",
        research: "Wireless Sensor Networks, IoT"
    },
    {
        name: "Dr. Jaya Sil",
        photo: "https://xsgames.co/randomusers/assets/avatars/female/45.jpg",
        email: "jsil@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Artificial Intelligence, Automata Theory",
        research: "Soft Computing, Image Processing"
    },
    {
        name: "Dr. Ruchira Naskar",
        photo: "https://xsgames.co/randomusers/assets/avatars/female/67.jpg",
        email: "ruchira@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Cryptography, Network Security",
        research: "Information Forensics, Watermarking"
    }
];

// Function to render the faculty cards dynamically
function renderFaculty(facultyList) {
    const grid = document.getElementById('facultyGrid');
    const noResults = document.getElementById('noResults');
    
    // Clear existing cards (except the no-results message)
    grid.innerHTML = '<div id="noResults" class="no-results">No faculty members found matching that name.</div>';

    if (facultyList.length === 0) {
        document.getElementById('noResults').style.display = 'block';
        return;
    }

    // Generate HTML for each faculty member
    facultyList.forEach(faculty => {
        const card = document.createElement('div');
        card.className = 'profile-card';
        
        card.innerHTML = `
            <img class="profile-pic" src="${faculty.photo}" alt="${faculty.name}">
            <h2 class="profile-name">${faculty.name}</h2>
            <div class="profile-qual">Highest Qualification: ${faculty.qualification}</div>
            <div class="profile-details">
                <p><span class="label">Email:</span> ${faculty.email}</p>
                <p><span class="label">Current Subjects:</span> ${faculty.subjects}</p>
                <p><span class="label">Research Areas:</span> ${faculty.research}</p>
            </div>
        `;
        
        grid.appendChild(card);
    });
}

// Function to filter faculty based on search input
function filterFaculty() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const filteredList = facultyDatabase.filter(f => f.name.toLowerCase().includes(input));
    renderFaculty(filteredList);
}

// Function to toggle between Light and Dark mode themes
function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    if (currentTheme === 'dark') {
        document.documentElement.removeAttribute('data-theme');
    } else {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
}

// Render all faculty on initial page load
window.onload = () => {
    renderFaculty(facultyDatabase);
};