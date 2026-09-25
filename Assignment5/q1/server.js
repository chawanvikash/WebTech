const http = require("http");

// Function to handle client requests
function handleRequest(req, res) {
    res.writeHead(200, {
        "Content-Type": "text/plain"
    });

    res.end("Hello Node");
}

// Create the server
const server = http.createServer(handleRequest);

// Start the server
server.listen(3000, () => {
    console.log("Server running at http://localhost:3000");
});