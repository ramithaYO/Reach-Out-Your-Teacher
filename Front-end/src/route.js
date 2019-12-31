import Home from './Home/Home';
import Middle from './Home/MiddleCol'
import Quations from './Home/ProblemCard'
import lint from './Home/lint'
import Editprofile from './Home/Editprofile'
import scard from './Home/SCard'
import Profile from './Profile/Profile'
import Clz from './components/Class'
import addcontent from './components/content'
import atten from './components/attendence'
import Student from './components/Student'
import Homenotf from './components/Home'
import studentresults from './components/Sresults'
import help from './components/help'
import Shome from './components/Studenthome'
import addresult from './components/result'
import msg from './components/msg'
import addclass from './components/addclass'
import removeclass from './components/removeclass'
import teacher from './student/teacher'
import test2 from './student/test'
import test4 from './student/test3'
import test3 from './student/test2'
import teacherp from './student/teacherprofile'
import SClz from './student/class'
import results from './student/results'
import getfeedback from './student/getfeedback'
import saddclass from './student/saddclass'
import sremoveclass from './student/sremoveclass'
import tselect from './student/tselect'
import Attendence from './student/Attendence'
import content from './student/content'
import teachercard from './student/teachercard'
import classcard from './student/classcard'
import About from './Home/navBarIten/About'
import t1 from './test'
import t2 from './test2'
export const routes=[
    { path: '/Main', component: Home,
      children: [
        {
          // UserProfile will be rendered inside User's <router-view>
          // when /user/:id/profile is matched
          path: 'Home',
          component: Homenotf,
          // children:[{path:'',component:Homenotf}]
        },
        {
            path:'Profile',
            component:Profile,
            children:[{path:'',component:Editprofile},
         
        ]
        },
        {
          path:'Student',
          component:Student,
          children:[{path:'',component:Shome},
          {path:'card/:id/:name',component:scard,name:'home'},
          {path:'results/:cid/:sid',component:studentresults},
        
        ]
      }
,
      {
        path:'Class',
        component:Clz,
        children:[{path:'',component:Quations},
        {path:'attendence',component:atten},
        {path:'addresult',component:addresult},
        {path:'addcontent',component:addcontent}
        
      ]
    },
    {
      path:'SClass',
      component:SClz,
      children:[{path:'',component:classcard},
      {path:'results/:userid/:clzid',component:results}  ,
      {path:'Attendence/:userid/:clzid' ,component:Attendence} ,
      {path:'content' ,component:content} ,
      {path:'test' ,component:test3} ,
      {path:'test3' ,component:test4},
      {path:'test4' ,component:getfeedback} 
      // sadd class and s remove class 
    ]
  },
    {
      path:'Teacher',
      component:teacher,

      children:[
        // {path:'',component:teachercard},
      {path:'teacherprofile/:id',component:teacherp},
      {path:'',component:tselect},
      // {path:'',component:test2},
    ]
    
  },
    {
      path:'Help',
      component:help
  }
        
      ]
    },
    {
        path:'/test',component:lint,
        
    }
];