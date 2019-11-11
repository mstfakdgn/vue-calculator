<template>
    <div class="calculator">
        <div class="display">{{current || '0'}}</div>
        <div @click="clear" class="btn">C</div>
        <div @click="sign" class="btn">+/-</div>
        <div @click="percent" class="btn">%</div>
        <div class="btn operator" @click="divide">/</div>
        <div class="btn" @click="append('7')">7</div>
        <div class="btn" @click="append('8')">8</div>
        <div class="btn" @click="append('9')">9</div>
        <div class="btn operator" @click="times">*</div>
        <div class="btn" @click="append('4')">4</div>
        <div class="btn" @click="append('5')">5</div>
        <div class="btn" @click="append('6')">6</div>
        <div class="btn operator" @click="minus">-</div>
        <div class="btn" @click="append('1')">1</div>
        <div class="btn" @click="append('2')">2</div>
        <div class="btn" @click="append('3')">3</div>
        <div class="btn operator" @click="plus">+</div>
        <div class="zero" @click="append('0')">0</div>
        <div class="btn" @click="dot">.</div>
        <div class="btn operator" @click="equal">=</div>
    </div>    
</template>

<script>
    export default {
        data(){
            return {
                current: '',
                operator:null,
                previous:null,
                operatorClicked:false,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            clear(){
                this.current = '';
            },
            sign(){
                this.current = this.current.charAt(0) === '-' ? 
                    this.current.slice(1) : `-${this.current}`;

            },
            percent(){
                this.current = `${parseFloat(this.current) / 100}` ;
            },
            append(number){
                if(this.operatorClicked){
                    this.current = '';
                    this.operatorClicked = false ;
                }
                this.current = `${this.current}${number}`;
            },
            dot(){
                if(this.current.indexOf('.') === -1){
                    this.append('.');
                }
            },
            setprevious(){
                this.previous = this.current;
            },
            divide(){
                this.operator = (a ,b) => b / a;
                this.setprevious();
                this.operatorClicked = true ;
            },
            times(){
                this.operator = (a ,b) => a * b ;
                this.setprevious();
                this.operatorClicked = true ;
            },
            minus(){
                this.operator = (a ,b) => b - a ;
                this.setprevious();
                this.operatorClicked = true ;
            },
            plus(){
                this.operator = (a ,b) => a + b ;
                this.setprevious();
                this.operatorClicked = true ;
            },
            equal(){
                this.current = `${this.operator(
                    parseFloat(this.current),parseFloat(this.previous))}`;
                    this.previous = null ;
            }
        }
    }
</script>

<style scoped>
    .calculator{
        margin: 0 auto;
        width: 400px;
        font-size:40px;
        display:grid;
        grid-template-columns: repeat(4,1fr);
        grid-auto-rows:minmax(50px,auto);
    }
    .display{
        grid-column: 1 / 5;
        background-color:#333;
        border: 1px solid #333;
        color:white;
        
    }
    .zero{
        grid-column: 1 / 3;
        background-color: #eee;
        border: 1px solid #333;
    }
    .btn{
        background-color: #f2f2f2;
        border: 1px solid #999;
    }
    .operator{
        background-color: orange;
        color:white;
    }
</style>

