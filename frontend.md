# Dealux

This project uses [Vue.js](https://vuejs.org/) and [Tailwind CSS](https://tailwindcss.com/). If you are getting stuck, read their documentation.

## Frontend Contribution Guide

This Contribution Guide is separated into two sections: `Components` and `Page`, although are connected with each other.
Preferably, a screen resolution of `1920x1080` is needed to attain optimum replication.

Before starting, it is better to read first `tailwind.config.js` and `/resources/css/app.css` to know what classes and utilities are available to use.

### Components

The first section is the `Components`. This section will talk about the creation and the proper coding standards to integrate seamlessly with the team.

- Components must be created in the `/resources/js/components/<type>` directory
- Component Types will be the following:
    - `ui`: User Interface - Buttons, Cards, etc.
    - `semantics`: Navbar, Footer, etc.
- `Tailwind CSS` would be used in order to style. Creation of CSS Stylesheet files - and preferably the usage of the `<style>` tag - is prohibited unless special occasions.
- `Desktop First Approach` will be used as the **UI/UX** team started that first.
- Kindly take the time to replicate what is in the Figma. At least 90% similarity.
- Mounting the component is handled in the next section.


#### Template
```vue
<template>
    <!-- Your Component Here -->

</template>

<script>
export default {
    name: '<COMPONENT_NAME>',
    props: {},
    methods: {},

}
</script>
```

#### Example
Component: `/resources/js/components/ui/Button.vue`:
```vue
<template>
    <!-- Tailwind is working here -->
    <button class="text-red-500">Button</button>

</template>

<script>
export default {
    name: 'Button',
    props: {},
    methods: {},

}
</script>
```

---
### Page
The second section is the `Page`. This section will talk about the creation and the proper coding standards to integrate seamlessly with the team.

- Pages must be included in the `/resources/js/pages/` directory
- `Tailwind CSS` would be used in order to style. Creation of CSS Stylesheet files - and preferably the usage of the `<style>` tag - is prohibited unless special occasions.
- `Desktop First Approach` will be used as the **UI/UX** team started that first.
- Kindly take the time to replicate what is in the Figma. At least 90% similarity.

#### Template
Page: `/resources/js/pages/LandingPage.vue`
```vue
<template>
    <section class="min-h-screen">
        <div class="container border border-blue-500 h-full">
            <!-- Content Here -->
        </div>
    </section>
</template>

<script>
export default {
    name: "LandingPage",
};
</script>

<style scoped>
/* Add styles here */
</style>
```

#### Mounting Components
Component: `/resources/js/components/ui/Button.vue`:
```vue
<template>
    <!-- Tailwind is working here -->
    <button class="text-red-500">Button</button>

</template>

<script>
export default {
    name: 'Button',
    props: {},
    methods: {},

}
</script>
```
Page: `/resources/js/pages/LandingPage.vue`
```vue
<template>
    <section class="min-h-screen">
        <div class="container border border-blue-500 h-full">
            <!-- Third, use the component -->
            <Button />
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue'; // First, import the component
export default {
    name: "LandingPage",
    components: { // Second, register the component
        Button
    }
};
</script>

<style scoped>
/* Add styles here */
</style>
```

---

### Questions/Problems

Should there be any problems, questions, or a missing typography/utility class, notify us through Discord.
