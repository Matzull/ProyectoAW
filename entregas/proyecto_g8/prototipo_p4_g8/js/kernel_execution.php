<script src="js/gpu-browser.min.js"></script>


<script>
    function exec(i_start, i_end) {
        const gpu = new GPU();
        const acelerated_kernel = gpu.createKernel(function (i_start, i_end) {
            let i = this.thread.x + i_start;
            <?= $kernel->getCode() ?>
        }).setOutput([i_end - i_start])

        return acelerated_kernel(i_start, i_end);
    }
</script>