const body = document.body;

const container = document.createElement("div");
container.className = "container";
body.appendChild(container);

const header = document.createElement("div");
header.className = "header";
container.appendChild(header);

const content = document.createElement("div");
content.className = "content";
container.appendChild(content);

const left = document.createElement("div");
left.className = "left";
content.appendChild(left);

const right = document.createElement("div");
right.className = "right";
content.appendChild(right);

const footer = document.createElement("div");
footer.className = "footer";
container.appendChild(footer);

const footerText = document.createElement("p");
footerText.className = "footerText";

const text = "CONTACT " + "<br>" + "info.ietsdb@gmail.com" + "<br>" + "+316122899114";
footerText.innerHTML = text;
footer.appendChild(footerText);