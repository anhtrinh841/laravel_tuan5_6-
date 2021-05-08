
# Authentication

## OAuth

### OAuth1.0 Refresh Token

- http://oauth.googlecode.com/svn/spec/ext/session/1.0/drafts/1/spec.html#anchor4
- https://developer.yahoo.com/oauth/guide/oauth-refreshaccesstoken.html

```js
request.post('https://api.login.yahoo.com/oauth/v2/get_token', {
  oauth: {
    consumer_key: '...',
    consumer_secret: '...',
    token: '...',
    token_secret: '...',
    session_handle: '...'
  }
}, function (err, res, body) {
  var result = require('querystring').parse(body)
  // assert.equal(typeof result, 'object')
})
```

### OAuth2 Refresh Token

- https://tools.ietf.org/html/draft-ietf-oauth-v2-31#section-6

```js
request.post('https://accounts.google.com/o/oauth2/token', {
  form: {
    grant_type: 'refresh_token',
    client_id: '...',
    client_secret: '...',
    refresh_token: '...'
  },
  json: true
}, function (err, res, body) {
  // assert.equal(typeof body, 'object')
})
```

# Multipart

## multipart/form-data

### Flickr Image Upload

- https://www.flickr.com/services/api/upload.api.html

```js
request.post('https://up.flickr.com/services/upload', {
  oauth: {
    consumer_key: '...',
    consumer_secret: '...',
    token: '...',
    token_secret: '...'
  },
  // all meta data should be included here for proper signing
  qs: {
    title: 'My cat is awesome',
    description: 'Sent on ' + new Date(),
    is_public: 1
  },
  // again the same meta data + the actual photo
  formData: {
    title: 'My 