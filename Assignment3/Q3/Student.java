class Student {
    private String name;
    private String department;
    private String institute;
    private int gradYear;

    public Student(String name, String department, String institute, int gradYear) {
        this.name = name;
        this.department = department;
        this.institute = institute;
        this.gradYear = gradYear;
    }

    public String getStudentInfo() {
        return this.name + " (" + this.department + ", " + this.institute + " Class of " + this.gradYear + ")";
    }
}

public class Project {
    private String title;
    private String team;
    private Student contributor;

    public Project(String title, String team, Student contributor) {
        this.title = title;
        this.team = team;
        this.contributor = contributor;
    }

    public void displayDetails() {
        System.out.println("Project: " + this.title + " by Team " + this.team);
        System.out.println("Contributor Record: " + this.contributor.getStudentInfo());
        System.out.println("Status: Successfully built through an equal team effort.");
    }

    public static void main(String[] args) {
        Student student = new Student("Chawan Vikas", "Computer Science", "IIEST Shibpur", 2028);
        Project myProject = new Project("Agri Saathi", "Asymptotes", student);
        myProject.displayDetails();
    }
}