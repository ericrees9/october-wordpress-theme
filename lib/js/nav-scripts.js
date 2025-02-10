console.log("nav scripts are in");

document.addEventListener("DOMContentLoaded", function () {
    const mainContent = document.getElementById("main-content");
    const navLinks = document.querySelectorAll("nav a");
    const homeLink = document.getElementById("home-link");
    const sidebar = document.getElementById("sidebar");
    const mobileMenuButton = document.getElementById("mobile_menu_checkbox");

    // Function to fetch page content asynchronously from the WordPress API
    async function fetchPageContent(slug, isHistoryPush = true) {
        try {
            let apiUrl = "/wp-json/wp/v2/pages";

            // If slug is provided, fetch that page; otherwise, load the homepage (adjust slug as needed)
            if (slug) {
                apiUrl += `?slug=${slug}`;
            } else {
                apiUrl += `?slug=homepage`;
            }

            const response = await fetch(apiUrl);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();

            if (data.length > 0) {
                mainContent.innerHTML = data[0].content.rendered;

                document.title = "Eric Rees" + (slug ? ` > ${data[0].title.rendered}` : "");
                
                // Only update browser history if needed
                if (isHistoryPush) {
                    history.pushState({ slug }, "", slug ? `/${slug}` : "/");
                }

                // Update the "show" class on homeLink as needed
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

    // Determine the initial slug from the URL.
    // If the pathname is not "/" then extract the slug from it.
    let initialSlug = "";
    if (window.location.pathname !== "/") {
        // This assumes your URL structure is like "/some-slug"
        const parts = window.location.pathname.split("/").filter(Boolean);
        initialSlug = parts.pop();
    }

    // Instead of forcing the base URL, initialize the state from the URL
    history.replaceState({ slug: initialSlug }, "", window.location.pathname);

    // On initial load, fetch the page content based on the current slug.
    fetchPageContent(initialSlug, false);

    // Listen for popstate events (back/forward navigation)
    window.addEventListener("popstate", function (event) {
        // If state exists, load the corresponding page content without pushing a new state.
        if (event.state) {
            fetchPageContent(event.state.slug, false);
        }
    });

    // Handle navigation clicks for all nav links
    navLinks.forEach(link => {
        link.addEventListener("click", async function (event) {
            event.preventDefault();
            const url = this.getAttribute("href");
            const slug = url.split("/").filter(Boolean).pop(); // Extract slug from URL

            // If this is the home link, use an empty slug; otherwise, use the extracted slug
            if (this === homeLink) {
                await fetchPageContent("", true);
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
