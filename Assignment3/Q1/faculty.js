// Expanded database with realistic AI-generated face placeholders
const facultyDatabase = [
    {
        name: "Dr. Sekhar Mandal",
        photo: "https://oldwww.iiests.ac.in//images/facultyimg/sekhar__cst.jpg",
        email: "sekhar@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Database Management Systems, Software Engineering",
        research: "Image Processing, Pattern Recognition"
    },
    {
        name: "Dr. Manas Hira",
        photo: "https://oldwww.iiests.ac.in/images/facultyimg/cst_mhira.jpg",
        email: "manashira@cs.iiests.ac.in",
        qualification: "M.Tech",
        subjects: "Operating Systems, Computer Architecture",
        research: "Theoretical Computer Science"
    },
    {
        name: "Dr. Asit Kumar Das",
        photo: "https://oldwww.iiests.ac.in//images/faculty-and-staff-images/photo.png",
        email: "akdas@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Data Structures, Algorithm Analysis",
        research: "Bioinformatics, Machine Learning, Data Mining"
    },
    {
        name: "Dr. Sipra Das Bit",
        photo: "https://oldwww.iiests.ac.in//images/faculty-and-staff-images/cst/cst-faculty_sipra-das-bit.jpg",
        email: "sdasbit@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Computer Networks, Mobile Computing",
        research: "Wireless Sensor Networks, IoT"
    },
    {
        name: "Dr. Jaya Sil",
        photo: "https://oldwww.iiests.ac.in//images/faculty-and-staff-images/cst/cst-faculty_jaya-sil.jpg",
        email: "jsil@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Artificial Intelligence, Automata Theory",
        research: "Soft Computing, Image Processing"
    },
    {
        name: "Dr. Nirnay Ghosh",
        photo: "https://oldwww.iiests.ac.in//images/faculty-and-staff-images/cst/cst-faculty_nirnay-ghosh.jpg",
        email: "nirnay@cs.iiests.ac.in",
        qualification: "Ph.D.",
        subjects: "Cloud Computing, Network Security",
        research: "Network Security, Mobile Crowdsensing, Internet of Things (IoT)"
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