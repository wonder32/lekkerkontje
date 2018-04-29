# Lekker kontje
Dit is het thema achter lekker-kontje.nl

## Requirements
- Wordpress
- Grafity forms
- meta box

## How to use me ?
Go to your wordpress theme folder with your terminal, and type the following commands :

	$ git clone https://github.com/wonder32/lekkerkontje.git [yourthemename]
    $ cd [yourthemename]
	$ npm install
	$ gulp

## Gulp tasks
I have some embeded gulp tasks that can be use for you workflow :

- `gulp` : Watch the `scss` directory and compile files to the style.css file
- `gulp styles` : Just compile the scss (no watching)
- `gulp minify` : Minify the style.css file, do this before production
- `gulp images` : Compress images located in the images folder
- `gulp compress` : Minify the javascript
