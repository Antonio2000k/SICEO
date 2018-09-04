module.exports = {
  env: {
    browser: true,
    node: true,
    commonjs: true,
    es6: true
  },
  extends: 'eslint:recommended',
  parserOptions: {
    ecmaVersion: 8,
    sourceType: 'module'
  },
  rules: {
    'no-console': ['error', { allow: ['warn', 'error', 'info'] }],
    'no-var': ['error'],
    'object-curly-spacing': ['error', 'always'],
    'quotes': ['error', 'single', { allowTemplateLiterals: true }]
  },
  globals: {
    'QUnit': false
  }
}
