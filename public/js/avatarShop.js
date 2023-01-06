
class Dialog {
    constructor(settings = {}) {
        this.settings = Object.assign(
            {
                accept: 'OK',
                bodyClass: 'dialog-open',
                cancel: 'Cancel',
                dialogClass: '',
                message: '',
                template: ''
            },
            settings
        )
        this.init()
    }

    collectFormData(formData) {
        const object = {};
        formData.forEach((value, key) => {
            if (!Reflect.has(object, key)) {
                object[key] = value
                return
            }
            if (!Array.isArray(object[key])) {
                object[key] = [object[key]]
            }
            object[key].push(value)
        })
        return object
    }

    getFocusable() {
        return [...this.dialog.querySelectorAll('button,[href],select,textarea,input:not([type="hidden"]),[tabindex]:not([tabindex="-1"])')]
    }

    init() {
        this.dialogSupported = typeof HTMLDialogElement === 'function'
        this.dialog = document.createElement('dialog')
        this.dialog.role = 'dialog'
        this.dialog.dataset.component = this.dialogSupported ? 'dialog' : 'no-dialog';
        this.dialog.innerHTML = `
            <form method="dialog" data-ref="form">
              <fieldset data-ref="fieldset" role="document">
                <legend data-ref="message" id="${(Math.round(Date.now())).toString(36)}"></legend>
                <div data-ref="template"></div>
              </fieldset>
              <menu>
                <button${this.dialogSupported ? '' : ` type="button"`} data-ref="cancel" value="cancel"></button>
                <button${this.dialogSupported ? '' : ` type="button"`} data-ref="accept" value="default"></button>
              </menu>
            </form>`
        document.body.appendChild(this.dialog)

        this.elements = {}
        this.focusable = []
        this.dialog.querySelectorAll('[data-ref]').forEach(el => this.elements[el.dataset.ref] = el)
        this.dialog.setAttribute('aria-labelledby', this.elements.message.id)
        this.elements.cancel.addEventListener('click', () => { this.dialog.dispatchEvent(new Event('cancel')) })
        this.dialog.addEventListener('keydown', e => {
            if (e.key === 'Enter') {
                if (!this.dialogSupported) e.preventDefault()
                this.elements.accept.dispatchEvent(new Event('click'))
            }
            if (e.key === 'Escape') this.dialog.dispatchEvent(new Event('cancel'))
            if (e.key === 'Tab') {
                e.preventDefault()
                const len =  this.focusable.length - 1;
                let index = this.focusable.indexOf(e.target);
                index = e.shiftKey ? index - 1 : index + 1;
                if (index < 0) index = len;
                if (index > len) index = 0;
                this.focusable[index].focus();
            }
        })
        this.toggle()
    }

    open(settings = {}) {
        const dialog = Object.assign({}, this.settings, settings)
        this.dialog.className = dialog.dialogClass || ''
        this.elements.accept.innerText = dialog.accept
        this.elements.cancel.innerText = dialog.cancel
        this.elements.cancel.hidden = dialog.cancel === ''
        this.elements.message.innerText = dialog.message
        this.elements.target = dialog.target || ''
        this.elements.template.innerHTML = dialog.template || ''

        this.focusable = this.getFocusable()
        this.hasFormData = this.elements.fieldset.elements.length > 0


        this.toggle(true)

        if (this.hasFormData) {
            this.focusable[0].focus()
            this.focusable[0].select()
        }
        else {
            this.elements.accept.focus()
        }
    }

    toggle(open = false) {
        if (this.dialogSupported && open) this.dialog.showModal()
        if (!this.dialogSupported) {
            document.body.classList.toggle(this.settings.bodyClass, open)
            this.dialog.hidden = !open
            if (this.elements.target && !open) {
                this.elements.target.focus()
            }
        }
    }

    waitForUser() {
        return new Promise(resolve => {
            this.dialog.addEventListener('cancel', () => {
                this.toggle()
                resolve(false)
            }, { once: true })
            this.elements.accept.addEventListener('click', () => {
                let value = this.hasFormData ? this.collectFormData(new FormData(this.elements.form)) : true;
                this.toggle()
                resolve(value)
            }, { once: true })
        })
    }
}


const dialog = new Dialog();



document.getElementById('btnCustom').addEventListener('click', (e) => {
    dialog.open({
        accept: 'Confirm',
        dialogClass: 'custom',
        message: 'Confirm purchase of new avatar',
        target: e.target,
        template:
            `
            <div class="roundProfilePic currentPic">
                <img src="/public/assets/avatars/1.svg" alt="User Icon">
            </div>
            `
    })
    dialog.waitForUser().then((res) => {  console.log(res) })
});