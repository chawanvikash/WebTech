class Student {
    constructor(name, department, institute, gradYear) {
        this.name = name;
        this.department = department;
        this.institute = institute;
        this.gradYear = gradYear;
    }

    getStudentInfo() {
        return `${this.name} &mdash; ${this.department}, ${this.institute} (Class of ${this.gradYear})`;
    }
}

class Project {
    constructor(title, team, contributor) {
        this.title = title;
        this.team = team;
        this.contributor = contributor;
    }

    displayDetails() {
        const outputHtml = `
            <div class="project-title"> ${this.title}</div>
            <div class="team-name">Built by Team ${this.team}</div>
            
            <div class="student-data">
                <strong>Student Record:</strong><br>
                ${this.contributor.getStudentInfo()}
            </div>
            
            <div class="footer-note">
                Status: Successfully deployed through an equal team effort.
            </div>
        `;
        
        document.getElementById("app").innerHTML = outputHtml;
    }
}

window.onload = () => {
    // Instantiating the student and project data
    const student = new Student("Chawan Vikas", "Computer Science", "IIEST Shibpur", 2028);
    const myProject = new Project("Agri Saathi", "Asymptotes", student);
    
    // Rendering to the screen
    myProject.displayDetails();
};