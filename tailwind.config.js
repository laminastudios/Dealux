/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./resources/**/*.blade.php', './resources/**/*.js', './resources/**/*.vue'],
    theme: {
        fontFamily: {
            mainfont: ['Montserrat', 'sans-serif'],
            subfont: ['Source Sans 3', 'sans-serif'],
        },

        colors: {
            // Generic Colors
            white: '#FFFFFF',
            black: '#000000',

            // Primary Colors
            neutral: {
                50: '#F2F2F2',
                100: '#D9D9D9',
                200: '#BFBFBF',
                300: '#A6A6A6',
                400: '#8C8C8C',
                500: '#737373',
                600: '#595959',
                700: '#404040',
                800: '#262626',
                900: '#0D0D0D',
            },
            primary: {
                50: '#E7F2FD',
                100: '#B7D7FA',
                200: '#88BCF7',
                300: '#58A2F4',
                400: '#2887F0',
                500: '#0F6DD7',
                600: '#0B55A7',
                700: '#083D77',
                800: '#041E3B',
                900: '#020C18',
            },
            success: {
                50: '#E9FCF0',
                100: '#BCF6D1',
                200: '#8FF0B3',
                300: '#62EA94',
                400: '#35E475',
                500: '#1BCA5C',
                600: '#159D47',
                700: '#0F7033',
                800: '#09431F',
                900: '#03160A',
            },
            warning: {
                50: '#FEF6E9',
                100: '#FCE4BC',
                200: '#FAD390',
                300: '#F9C163',
                400: '#F7AF37',
                500: '#F59E0A',
                600: '#C88108',
                700: '#9C6406',
                800: '#6F4805',
                900: '#432B03',
            },
            destructive: {
                50: '#FCEBEB',
                100: '#F6C3C3',
                200: '#F09A9A',
                300: '#EA7272',
                400: '#E44A4A',
                500: '#DD2222',
                600: '#B51B1B',
                700: '#8D1515',
                800: '#650F0F',
                900: '#3C0909',
            },

            // Secondary Colors
            yellow: {
                50: '#FFF5E8',
                100: '#FFE1B9',
                200: '#FFCD8B',
                300: '#FFBE69',
                400: '#FFA52E',
                500: '#FF9100',
                600: '#D17600',
                700: '#A25C00',
                800: '#744200',
                900: '#462700',
            },
            red: {
                50: '#FBEDEC',
                100: '#F2C9C7',
                200: '#E9A5A1',
                300: '#E0817C',
                400: '#D75C56',
                500: '#CF3830',
                600: '#9E2B25',
                700: '#83241F',
                800: '#5E1A16',
                900: '#380F0D',
            },
            green: {
                50: '#DDF8E8',
                100: '#C5F3D8',
                200: '#9FEBBE',
                300: '#78E3A4',
                400: '#52DB8A',
                500: '#2CD370',
                600: '#24AD5C',
                700: '#1C8747',
                800: '#146033',
                900: '#0C3A1F',
            },
            blue: {
                50: '#ECEEFB',
                100: '#C6CCF3',
                200: '#A0AAEA',
                300: '#7A88E2',
                400: '#5366DA',
                500: '#ED52D5',
                600: '#2538AB',
                700: '#1D2B85',
                800: '#151F5F',
                900: '#0C1339',
            },
        },
        fontWeight: {
            regular: 400,
            medium: 500,
            semibold: 600,
            bold: 700,
            extrabold: 800,
        },
        screens: {
            sm: '320px',
            md: '768px',
            lg: '1024px',
            xl: '1440px',
            '2xl': '1920px',
        },
        container: {
            center: true,
            padding: '0',
        },
    },
    plugins: [],
};
