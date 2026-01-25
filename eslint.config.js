import js from '@eslint/js';
import pluginVue from 'eslint-plugin-vue';
import eslintConfigPrettier from 'eslint-config-prettier';
import vitest from '@vitest/eslint-plugin';
import globals from 'globals';

export default [
    {
        ignores: [
            'vendor/**',
            'public/**',
            'node_modules/**',
            'storage/**',
            'bootstrap/ssr/**',
        ],
    },
    js.configs.recommended,
    ...pluginVue.configs['flat/recommended'],
    eslintConfigPrettier,
    {
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: 'module',
            globals: {
                ...globals.browser,
                ...globals.node,
                $: 'readonly',
                jQuery: 'readonly',
                axios: 'readonly',
            },
        },
        rules: {
            'vue/multi-word-component-names': 'off',
            'no-undef': 'error',
            'no-unused-vars': 'error',
            'vue/no-unused-vars': 'error',
            'vue/attributes-order': 'off',
            'vue/first-attribute-linebreak': 'off',
        },
    },
    {
        files: ['**/*.{test,spec}.{js,ts}'],
        plugins: {
            vitest,
        },
        languageOptions: {
            globals: {
                ...globals.browser,
                ...globals.node,
                describe: 'readonly',
                it: 'readonly',
                test: 'readonly',
                expect: 'readonly',
                vi: 'readonly',
                beforeAll: 'readonly',
                afterAll: 'readonly',
                beforeEach: 'readonly',
                afterEach: 'readonly',
            },
        },
        rules: {
            ...vitest.configs.recommended.rules,
        },
    },
];
