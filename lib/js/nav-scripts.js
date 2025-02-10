console.log("nav scripts are in");

document.addEventListener("DOMContentLoaded", function () {
    const mainContent = document.getElementById("main-content");
    const navLinks = document.querySelectorAll("nav a");
    const homeLink = document.getElementById("home-link");
    const sidebar = document.getElementById("sidebar");
    const mobileMenuButton = document.getElementById("mobile_menu_checkbox");

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

    // Make sure all elements exist
    if (!mobileMenuButton || !sidebar || !mainContent) {
        console.error("One or more required elements were not found.");
        return;
      }
  
      // Helper function: sync checkbox with the sidebar's active state
      function syncCheckbox() {
        mobileMenuButton.checked = sidebar.classList.contains("active");
      }
  
      // Toggle function to add/remove classes and update checkbox state
      function toggleMenu() {
        sidebar.classList.toggle("active");
        mainContent.classList.toggle("darken");
        syncCheckbox();
      }
  
      // When the mobile menu checkbox is clicked, toggle the menu
      mobileMenuButton.addEventListener("click", function () {
        toggleMenu();
      });
  
      // When clicking on the main content, if the sidebar is open, close it
      mainContent.addEventListener("click", function () {
        if (sidebar.classList.contains("active")) {
          sidebar.classList.remove("active");
          mainContent.classList.remove("darken");
          syncCheckbox();
        }
      });
  
      // Set up a MutationObserver to watch for changes to the sidebar's class attribute.
      // This will keep the mobile menu checkbox in sync even if other code modifies the sidebar.
      const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
          if (mutation.type === "attributes" && mutation.attributeName === "class") {
            syncCheckbox();
          }
        });
      });
  
      // Start observing the sidebar element for attribute (class) changes
      observer.observe(sidebar, { attributes: true });
});
