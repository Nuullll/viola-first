<script>
    var nextImg = document.createElement("img");

    var navNext = document.getElementsByClassName("nav-next")[0];

    if (!navNext.classList.contains("disabled")) {

        var nextTitle = navNext.getElementsByClassName("post-title")[0];
            nextTitleText = nextTitle.textContent;

        var apiPrefix = "http://viola-wang.com/wp-json/oembed/1.0/embed?url=";

        fetch(apiPrefix + navNext.href).
            then(resp => resp.json()).
            then(function(data) {
                nextImg.src = data.thumbnail_url;
            });

        nextImg.classList.add("nav-next-thumbnail");

        navNext.insertBefore(nextImg, nextTitle);

        // restructure figcaption
        var metaNav = navNext.getElementsByClassName("meta-nav")[0];
        navNext.removeChild(nextTitle);

        var captionDiv = document.createElement("div");
            caption = document.createElement("figcaption");
            nextDiv = document.createElement("div");
            titleDiv = document.createElement("div");

        nextDiv.textContent = "Next";
        // nextDiv.classList.add("next-previous-text");
        // nextDiv.classList.add("h6-size");
        titleDiv.textContent = nextTitleText;
        titleDiv.classList.add("title-text");
        titleDiv.classList.add("h4-size");

        caption.classList.add("rollover-caption");
        // caption.appendChild(nextDiv);
        caption.appendChild(titleDiv);

        captionDiv.appendChild(caption);
        captionDiv.classList.add("hover-caption-scale");
        navNext.appendChild(captionDiv);
        navNext.classList.add("hover-navigation");

        // wrap meta-next outside
        var wrapper = document.createElement("div");
        wrapper.classList.add("nav-next-container");
        var parent = navNext.parentElement;
        parent.insertBefore(wrapper, navNext);
        wrapper.appendChild(metaNav);
        wrapper.appendChild(navNext);
    }
</script>

<script>
    var prevImg = document.createElement("img");

    var navPrev = document.getElementsByClassName("nav-previous")[0];

    if (!navPrev.classList.contains("disabled")) {

        var prevTitle = navPrev.getElementsByClassName("post-title")[0];
            prevTitleNext = prevTitle.textContent;

        var apiPrefix = "http://viola-wang.com/wp-json/oembed/1.0/embed?url=";

        fetch(apiPrefix + navPrev.href).
            then(resp => resp.json()).
            then(function(data) {
                prevImg.src = data.thumbnail_url;
            });

        prevImg.classList.add("nav-previous-thumbnail");

        navPrev.insertBefore(prevImg, prevTitle);

        // restructure figcaption
        var metaNav = navPrev.getElementsByClassName("meta-nav")[0];
        navPrev.removeChild(prevTitle);

        var captionDiv = document.createElement("div");
            caption = document.createElement("figcaption");
            prevDiv = document.createElement("div");
            titleDiv = document.createElement("div");

        prevDiv.textContent = "Previous";
        prevDiv.classList.add("next-previous-text");
        prevDiv.classList.add("h6-size");
        titleDiv.textContent = prevTitleNext;
        titleDiv.classList.add("title-text");
        titleDiv.classList.add("h4-size");

        caption.classList.add("rollover-caption");
        // caption.appendChild(prevDiv);
        caption.appendChild(titleDiv);

        captionDiv.appendChild(caption);
        captionDiv.classList.add("hover-caption-scale");
        navPrev.appendChild(captionDiv);
        navPrev.classList.add("hover-navigation");

        // wrap meta-next outside
        var wrapper = document.createElement("div");
        wrapper.classList.add("nav-previous-container");
        var parent = navPrev.parentElement;
        parent.insertBefore(wrapper, navPrev);
        wrapper.appendChild(metaNav);
        wrapper.appendChild(navPrev);
    }
</script>
