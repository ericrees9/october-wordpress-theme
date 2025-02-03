console.log("hello");

document.addEventListener("DOMContentLoaded", function () {
    const mainContent = document.getElementById("main-content");
    const navLinks = document.querySelectorAll("nav a");
    const homeLink = document.getElementById("home-link");

    // Function to fetch page content asynchronously
    async function fetchPageContent(slug, isHistoryPush = true) {
        try {
            let apiUrl = "/wp-json/wp/v2/pages";

            // If slug is empty (homepage), fetch the homepage data
            if (slug) {
                apiUrl += `?slug=${slug}`;
            } else {
                apiUrl += `?slug=homepage`; // Change 'homepage' to your actual homepage slug
            }

            const response = await fetch(apiUrl);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();

            if (data.length > 0) {
                mainContent.innerHTML = data[0].content.rendered;
                
                // Ensure proper history updates
                if (isHistoryPush) {
                    history.pushState({ slug }, "", slug ? `/${slug}` : "/");
                }

                // **Update "show" class on home-link**
                if (homeLink) {
                    if (window.location.pathname === "/") {
                        homeLink.classList.remove("show");
                    } else {
                        homeLink.classList.add("show");
                    }
                }
            }
        } catch (error) {
            console.error("Error loading page:", error);
        }
    }

    // Ensure homepage is stored in history state on first load
    if (!history.state) {
        history.replaceState({ slug: "" }, "", "/");
    }

    // Handle navigation clicks for all nav links except the Home link
    navLinks.forEach(link => {
        link.addEventListener("click", async function (event) {
            event.preventDefault();
            const url = this.getAttribute("href");
            const slug = url.split("/").filter(Boolean).pop(); // Extract slug
            
            if (this === homeLink) {
                await fetchPageContent("", true); // Load homepage
            } else {
                await fetchPageContent(slug, true);
            }
        });
    });

    // Handle back/forward navigation
    window.addEventListener("popstate", async function (event) {
        const slug = event.state ? event.state.slug : ""; // Extract slug from state
        await fetchPageContent(slug, false);
    });
});
