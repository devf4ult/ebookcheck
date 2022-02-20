echo "# ebookcheck" >> README.md
git init
git add *
git commit -m "simple ebook repository"
git branch -M main
git remote add origin https://github.com/devf4ult/ebookcheck.git
git push -u origin main
