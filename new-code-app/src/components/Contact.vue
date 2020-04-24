<template>
   <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <form>
                    <div class="form-group"><label>Name</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>Subject</label><input class="form-control" type="text"></div>
                    <div class="form-group"><label>Email</label><input class="form-control" type="email"></div>
                    <div class="form-group"><label>Message</label><textarea class="form-control"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Send</button></div>
                    <div class="alert alert-danger" role="alert" v-if="error">
            {{ error }}
          </div>
          <div class="alert alert-success" role="alert" v-if="message">
            {{ message }}
          </div>
                </form>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    data() {
        return {
            message: null,
            error: null
        }
    }
}
</script>

<style>

</style>