// https://tailwindcss.com/docs/configuration
module.exports = {
  content: [
    "./index.php",
    "./app/**/*.php",
    "./resources/**/*.{php,vue,js, tsx}",
  ],
  theme: {
    extend: {
      colors: {
        primary: "var(--primary)",
        secondary: "var(--secondary)",
        third: "var(--third)",
        hover: "var(--hover)",
        hoverOrange: "var(--hoverOrange)",
        greenColor: "var(--green)",
        redColor: "var(--red)",
        lightYellow: "var(--lightYellow)",
        lightOrange: "var(--lightOrange)",
        darkOrange: "var(--darkOrange)",
        darkerRed: "var(--darkerRed)",
        darkerBlue: "var(--darkerBlue)",
        lightGray: "var(--lightGray)",
        text: "#333333",
        13: "#131313",
        googleRatingStar: "#FFDB49",
        facebookRatingStar: "#5892F8",
        borderColorRed: "#FF0000",
      }, // Extend Tailwind's default colors
      fontSize: {
        smallParagraph:  ["var(--default-small-p-size)", "20px"],
        default: ["var(--default-font-size)", "1.5"],
        p: ["var(--default-p-size)", "32px"],
        h1: ["var(--default-h1-size)", "56px"],
        h2: ["var(--default-h2-size)", "48px"],
        subheadingh2: ["var(--default-subheadingh2-size)", "32px"],
        h3: ["var(--default-h3-size)", "40px"],
        smallParagraphMob:  ["var(--mob-small-p-size)", "20px"],
        defaultMob: ["var(--mob-default-font-size)", "20px"],
        h1Mob: ["var(--h1-mob-size)", "40px"],
        h2Mob: ["var(--h2-mob-size)", "32px"],
        subheadingh2Mob: ["var(--subheadingh2-mob-size)", "30px"],
        h3Mob: ["var(--h3-mob-size)", "28px"],
        "4.5xl": "2.5rem",

        //h3: ["28px", "1.2"],
      },
      fontFamily: {
        default: "var(--default-font-family)",
      },
      maxWidth: {
        contentwidth: "750px",
        titleWidth: "850px",
        pageWidth: "1180px",
        "4/5": "80%",
      },
      boxShadow: {
        DEFAULT: "var(--box-shadow)",
      },
      borderRadius: {
        DEFAULT: "var(--border-radius)",
      },
      container: {
        padding: "20px",
        center: true,
      },

      width: {
        checkout: "calc(50% - 16px)",
      },
      keyframes: {
        wiggle: {
          "0%, 100%": { transform: "rotate(-2deg)" },
          "50%": { transform: "rotate(2deg)" },
        },
        rocking: {
          "0%, 100%": { transform: "rotate(0deg)" },
          "25%": { transform: "rotate(0deg)" },
          "50%": { transform: "rotate(2deg)" },
          "75%": { transform: "rotate(-2deg)" },
        },
      },
      animation: {
        rocking: "rocking 2s infinite",
        wiggle: "wiggle 2s ease-in-out infinite",
      },
    },
  },
  plugins: [],
  corePlugins: {
    preflight: false,
  },
};
