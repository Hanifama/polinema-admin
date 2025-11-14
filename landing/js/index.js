document.addEventListener("DOMContentLoaded", function () {
    initBannerSideBarToggle();
    initFlowingBanner();
    initFlowingBannerReverse();
    initFillInGsap();
});

function initBannerSideBarToggle() {
    let sidebar = document.getElementById("sidebar");
    let btnToggle = document.getElementById("btnToggle");
    // let closeSidebarBtn = document.getElementById("closeSidebar");

    sidebar.addEventListener("click", (event) => {
        sidebar.classList.remove("active");
        console.log("Remove Active");
    });

    btnToggle.addEventListener("click", () => {
        sidebar.classList.add("active");
    });
}

function initFlowingBanner() {
    let flowingElement = document.getElementById("flowingBanner");
    let svg = flowingElement.querySelector("svg");
    let path = svg.querySelector("path");

    const pathLength = path.getTotalLength();

    gsap.set(path, { strokeDasharray: 1500 });

    gsap.fromTo(
        path,
        { strokeDashoffset: pathLength },
        {
            strokeDashoffset: 0,
            duration: 10,
            repeat: -1,
            ease: "linear",
        }
    );
}

function initFlowingBannerReverse() {
    let flowingElement = document.getElementById("flowingBannerReverse");
    let svg = flowingElement.querySelector("svg");
    let path = svg.querySelector("path");

    const pathLength = path.getTotalLength();

    gsap.set(path, { strokeDasharray: 1500 });

    gsap.fromTo(
        path,
        { strokeDashoffset: pathLength },
        {
            strokeDashoffset: 0,
            duration: 10,
            repeat: -1,
            ease: "linear",
        }
    );
}

function initFillInGsap() {
    gsap.fromTo(
        "._fill-in-gsap",
        { clipPath: "inset(0 100% 0 0)", display: "block" }, // Start fully hidden
        { clipPath: "inset(0 0% 0 0)", duration: 2, ease: "power2.out" }
    );
}
