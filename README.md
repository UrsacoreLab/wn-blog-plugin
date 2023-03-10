# Блог / Blog

Плагин "[UrsacoreLab.StaticVars](https://github.com/UrsacoreLab/wn-staticvars-plugin)" - обязательно!

### /api/blog/categories

```json
{
    "data": [
        {
            "name": "News",
            "slug": "news",
            "keywords": ""
        },
        {
            "name": "Articles",
            "slug": "articles",
            "keywords": ""
        }
    ],
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### /api/blog/category/{slug}

```json
{
    "data": {
        "name": "News",
        "slug": "news",
        "keywords": ""
    },
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### /api/blog/posts

```json
{
    "data": [
        {
            "name": "Article 1",
            "keywords": "",
            "title": "Article 1",
            "introductory": "",
            "content": "",
            "slug": "article-1",
            "category": {
                "name": "Articles",
                "slug": "articles",
                "keywords": ""
            }
        },
        {
            "name": "News post 1",
            "keywords": "",
            "title": "News post 1",
            "introductory": "",
            "content": "",
            "slug": "news-post-1",
            "category": {
                "name": "News",
                "slug": "news",
                "keywords": ""
            }
        }
    ],
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```

### /api/blog/posts/{slug}

```json
{
    "data": {
        "name": "News post 1",
        "keywords": "",
        "title": "News post 1",
        "introductory": "",
        "content": "",
        "slug": "news-post-1",
        "category": {
            "name": "News",
            "slug": "news",
            "keywords": ""
        }
    },
    "type": "success",
    "show": true,
    "translate_code": "statuses.synced",
    "messages": null
}
```
