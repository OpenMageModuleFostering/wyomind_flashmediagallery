Product.Gallery.addMethods({
    loadImage: function(file) {
        var image = this.getImageByFile(file);

        this.getFileElement(file, 'cell-image img').src = image.url;
        this.getFileElement(file, 'cell-image embed').src = image.url;
        if (file.indexOf(".swf") || file.indexOf(".flv"))
            this.getFileElement(file, 'cell-image embed').show();
        else
            this.getFileElement(file, 'cell-image img').show();
        this.getFileElement(file, 'cell-image .place-holder').hide();
    }
})